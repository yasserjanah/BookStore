<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\LivreType;
use App\Form\SearchLivreType;
use App\Form\IncreaseLivreNoteType;
use App\Repository\LivreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/livre')]
class LivreController extends AbstractController
{
    #[Route('/', name: 'livre_index')]
    public function index(LivreRepository $livreRepository,Request $req): Response
    {
        $livres = $livreRepository->findAll();
        $form = $this->createForm(SearchLivreType::class);
        
        $search = $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){

            $livres = $livreRepository->findByTitle($search->get('titre')->getData());
        }

        return $this->render('livre/index.html.twig', [
            'livres' => $livres,
            'search' => $form->createView(),
            'totalLivres' => $livreRepository->findCount()
        ]);
    }

    #[Route('/new', name: 'livre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        // check if is admin
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('livre_index');
        }

        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($livre);
            $entityManager->flush();
            $this->addFlash(
                'Success',
                'Your book was added successfully !'
            );
            return $this->redirectToRoute('livre_index', [], Response::HTTP_SEE_OTHER);

        }

        return $this->renderForm('livre/new.html.twig', [
            'livre' => $livre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'livre_show', methods: ['GET', 'POST'])]
    public function show(Livre $livre, Request $request, LivreRepository $livreRepository): Response
    {

        // Increase the livre note
        $form = $this->createForm(IncreaseLivreNoteType::class);
        // set default value for the form
        $form->get('note')->setData($livre->getNote());
        $increase = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            // update the livre note
            $livreRepository->setNote($form->get('note')->getData(), $livre->getId());
            $this->addFlash(
                'Success',
                'Livre note was updated successfully !'
            );
            return $this->redirectToRoute('livre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('livre/show.html.twig', [
            'livre' => $livre,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'livre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Livre $livre, EntityManagerInterface $entityManager): Response
    {
        // check if is admin
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('livre_index');
        }

                
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash(
                'Success',
                'Your book was updated successfully !'
            );
            return $this->redirectToRoute('livre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('livre/edit.html.twig', [
            'livre' => $livre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'livre_delete', methods: ['POST'])]
    public function delete(Request $request, Livre $livre, EntityManagerInterface $entityManager): Response
    {

        // check if is admin
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('livre_index');
        }
        

        if ($this->isCsrfTokenValid('delete'.$livre->getId(), $request->request->get('_token'))) {
            $entityManager->remove($livre);
            $entityManager->flush();
            $this->addFlash(
                'Warning',
                'This Book had been deleted successfully !'
            );
        }

        return $this->redirectToRoute('livre_index', [], Response::HTTP_SEE_OTHER);
    }
}
