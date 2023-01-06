<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    #[Route('/hy/{req<\w+>}/{name<\w+>}', methods: ['GET'], name: 'app_hello')]
    public function index(Request $request, string $req, string $name = 'remi'): Response
    {
        return $this->render('hello/index.html.twig', [
            'controller_name' => 'HelloController',
            'category' => [
                'title' => 'Sample '.$name,
            ],
            'example' => 1
        ]);
    }
}
