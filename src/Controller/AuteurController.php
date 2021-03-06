<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Form\AuteurType;
use App\Repository\AuteurRepository;
use App\Repository\LivreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/auteur')]
class AuteurController extends AbstractController
{
    #[Route('/', name: 'auteur_index', methods: ['GET'])]
    public function index(AuteurRepository $auteurRepository): Response
    {
        return $this->render('auteur/index.html.twig', [
            'auteurs' => $auteurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'auteur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        // check if user is an admin
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('auteur_index');
        }

        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($auteur);
            $entityManager->flush();
            $this->addFlash(
                'Success',
                'Your auteur was added successfully !'
            );
            return $this->redirectToRoute('auteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('auteur/new.html.twig', [
            'auteur' => $auteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'auteur_show', methods: ['GET'])]
    public function show(Auteur $auteur, LivreRepository $livreRepository): Response
    {

        // TODO: filter books by auteur
        $livres = $livreRepository->findAll();

        return $this->render('auteur/show.html.twig', [
            'auteur' => $auteur,
            'livres' => $livres,
        ]);

    }

    #[Route('/{id}/edit', name: 'auteur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Auteur $auteur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);

        // check if user is an admin
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('auteur_index');
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash(
                'Success',
                'Your auteur was updated successfully !'
            );
            return $this->redirectToRoute('auteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('auteur/edit.html.twig', [
            'auteur' => $auteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'auteur_delete', methods: ['POST'])]
    public function delete(Request $request, Auteur $auteur, EntityManagerInterface $entityManager): Response
    {
        // check if user is an admin
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('auteur_index');
        }
        
        if ($this->isCsrfTokenValid('delete'.$auteur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($auteur);
            $entityManager->flush();
            $this->addFlash(
                'Warning',
                'Your auteur was deleted successfully !'
            );
        }

        return $this->redirectToRoute('auteur_index', [], Response::HTTP_SEE_OTHER);
    }
    
}
