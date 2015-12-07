<?php

namespace Student\Action;

use Common\Http\RestfulActionTrait;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Student\Service\StudentService;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Server;
use Zend\Expressive\Router\RouterInterface;
use Common\WebService\WebService;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response AS WebServiceResponse;
use Zend\Db\Sql\Predicate\In;
use Student\Entity\StudentEntity;

class StudentAction
{
    use RestfulActionTrait;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var StudentService
     */
    private $studentService;

    /**
     * @var WebService|Client
     */
    private $classroomWebService;

    /**
     * @param RouterInterface $router
     * @param StudentService $studentService
     * @param WebService $classroomWebService
     */
    public function __construct(
        RouterInterface $router,
        StudentService $studentService,
        WebService $classroomWebService
    ) {
        $this->router         = $router;
        $this->studentService = $studentService;
        $this->classroomWebService = $classroomWebService;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable|null $next
     * @return JsonResponse
     */
    public function get(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ) {
        $student = $this->studentService->findById(
            $request->getAttribute($this->identifier)
        );

        if (!$student->isValid()) {
            return $response->withStatus(404, 'Not Found');
        }

        return new JsonResponse([
            'id'         => $student->getId(),
            'first_name' => $student->getFirstName(),
            'last_name'  => $student->getLastName()
        ]);
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable|null $next
     * @return JsonResponse
     */
    public function getList(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ) {
        $params    = $request->getQueryParams();
        $teacherId = $params['teacher_id'] ?: null;

        /** @var WebServiceResponse $result */
        $result = $this->classroomWebService->get(
            '/api/teacher/classroom/' . $teacherId
        );

        $classroom = $this->classroomWebService->getData($result);

        $studentIds = array();
        foreach ($classroom as $data) {
            if (isset($data['student_id'])) {
                $studentIds[] = $data['student_id'];
            }
        }

        $in = new In('id', $studentIds);

        $collection = $this->studentService->findAll(array($in));

        $result = array();
        foreach ($collection as $student) {
            /** @var StudentEntity $student */
            $result[] = array(
                'id'            => $student->getId(),
                'first_name'    => $student->getFirstName(),
                'last_name'     => $student->getLastName(),
                'earned_stars'  => $student->getEarnedStarts(),
                'email'         => $student->getEmail(),
                'added_at'      => $student->getAddedAt(),
                'last_modified' => $student->getLastModified(),
                'icon'          => $student->getUserIcon()
            );
        }

        return new JsonResponse($result);
    }
}
