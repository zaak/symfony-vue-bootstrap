<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Repository\TodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController
{
    /**
     * @Route("/todo", name="todo_list", methods={"GET"})
     */
    public function todo()
    {
        /** @var TodoRepository $todoRepository */
        $todoRepository = $this->getDoctrine()->getRepository('App:Todo');

        return JsonResponse::create($todoRepository->findAll());
    }

    /**
     * @Route("/todo", name="todo_add", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function addTodo(Request $request)
    {
        $this->checkCsrfToken($request);

        $todo = Todo::createFromJson($request->getContent());

        $em = $this->getDoctrine()->getManager();
        $em->persist($todo);
        $em->flush();

        return JsonResponse::create($todo);
    }

    /**
     * @Route("/todo/{id}", name="todo_remove", methods={"DELETE"})
     * @param Request $request
     * @return JsonResponse
     */
    public function removeTodo(Request $request)
    {
        $this->checkCsrfToken($request);

        /** @var TodoRepository $todoRepository */
        $todoRepository = $this->getDoctrine()->getRepository('App:Todo');

        $todo = $todoRepository->find($request->get('id'));

        if (!$todo) {
            throw new NotFoundHttpException();
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($todo);
        $em->flush();

        return JsonResponse::create($todo);
    }

    /**
     * @param Request $request
     */
    protected function checkCsrfToken(Request $request)
    {
        $csrfToken = $request->headers->get('X-CSRF-Token');

        if (!$this->isCsrfTokenValid('todo', $csrfToken)) {
            throw new UnauthorizedHttpException('Invalid CSRF token');
        }
    }
}
