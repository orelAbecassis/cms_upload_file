<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspacClientController extends AbstractController
{
    #[Route('/espac/client', name: 'app_espac_client')]
    public function index(): Response
    {
        return $this->render('espac_client/index.html.twig', [
            'controller_name' => 'EspacClientController',
        ]);
    }
}
