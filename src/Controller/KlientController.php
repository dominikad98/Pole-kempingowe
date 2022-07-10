<?php

namespace App\Controller;

use App\Entity\Klient;
use App\Form\KlientType;
use App\Repository\KlientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/klient')]
class KlientController extends AbstractController
{
    #[Route('/', name: 'app_klient_index', methods: ['GET'])]
    public function index(KlientRepository $klientRepository, Request $request): Response
    {

        return $this->render('klient/index.html.twig', [
            'klients' => $klientRepository->findAll(),

        ]);
    }


    #[Route('/new', name: 'app_klient_new', methods: ['GET', 'POST'])]
    public function new(Request $request, KlientRepository $klientRepository): Response
    {
        $klient = new Klient();
        $form = $this->createForm(KlientType::class, $klient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $klientRepository->add($klient, true);

            return $this->redirectToRoute('app_klient_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('klient/new.html.twig', [
            'klient' => $klient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_klient_show', methods: ['GET'])]
    public function show(Klient $klient): Response
    {
        return $this->render('klient/show.html.twig', [
            'klient' => $klient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_klient_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Klient $klient, KlientRepository $klientRepository): Response
    {
        $form = $this->createForm(KlientType::class, $klient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $klientRepository->add($klient, true);

            return $this->redirectToRoute('app_klient_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('klient/edit.html.twig', [
            'klient' => $klient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_klient_delete', methods: ['POST'])]
    public function delete(Request $request, Klient $klient, KlientRepository $klientRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$klient->getId(), $request->request->get('_token'))) {
            $klientRepository->remove($klient, true);
        }

        return $this->redirectToRoute('app_klient_index', [], Response::HTTP_SEE_OTHER);
    }
}
