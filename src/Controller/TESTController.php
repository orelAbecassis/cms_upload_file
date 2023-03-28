<?php

namespace App\Controller;

use App\Entity\TEST;
use App\Form\TESTType;
use App\Repository\TESTRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/test')]
class TESTController extends AbstractController
{
    #[Route('/', name: 'app_t_e_s_t_index', methods: ['GET'])]
    public function index(TESTRepository $tESTRepository): Response
    {

        return $this->render('jcp/index.html.twig', [
            't_e_s_ts' => $tESTRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_t_e_s_t_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TESTRepository $tESTRepository): Response
    {
        $tEST = new TEST();
        $form = $this->createForm(TESTType::class, $tEST);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tESTRepository->save($tEST, true);

            return $this->redirectToRoute('app_t_e_s_t_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('test/new.html.twig', [
            't_e_s_t' => $tEST,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_t_e_s_t_show', methods: ['GET'])]
    public function show(TEST $tEST): Response
    {
        return $this->render('test/show.html.twig', [
            't_e_s_t' => $tEST,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_t_e_s_t_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TEST $tEST, TESTRepository $tESTRepository): Response
    {
        $form = $this->createForm(TESTType::class, $tEST);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tESTRepository->save($tEST, true);

            return $this->redirectToRoute('app_t_e_s_t_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('test/edit.html.twig', [
            't_e_s_t' => $tEST,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_t_e_s_t_delete', methods: ['POST'])]
    public function delete(Request $request, TEST $tEST, TESTRepository $tESTRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tEST->getId(), $request->request->get('_token'))) {
            $tESTRepository->remove($tEST, true);
        }

        return $this->redirectToRoute('app_t_e_s_t_index', [], Response::HTTP_SEE_OTHER);
    }
}
