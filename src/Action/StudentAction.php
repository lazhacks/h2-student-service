<?php

namespace Student\Action;

use Common\Http\RestfulActionTrait;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Student\Service\StudentService;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router\RouterInterface;

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
     * @param RouterInterface $router
     * @param StudentService $studentService
     */
    public function __construct(
        RouterInterface $router,
        StudentService $studentService
    ) {
        $this->router         = $router;
        $this->studentService = $studentService;
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
}
