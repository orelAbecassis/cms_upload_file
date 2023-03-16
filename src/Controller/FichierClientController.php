<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FichierClientController extends AbstractController
{
    #[Route('/fichier/client', name: 'app_fichier_client')]
    public function index(): Response
    {
        return $this->render('fichier_client/index.html.twig', [
            'controller_name' => 'FichierClientController',
        ]);
    }
}
