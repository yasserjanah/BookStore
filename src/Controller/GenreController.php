<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Form\GenreType;
use App\Repository\GenreRepository;
use App\Repository\LivreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/genre')]
class GenreController extends AbstractController
{
    #[Route('/', name: 'genre_index', methods: ['GET'])]
    public function index(GenreRepository $genreRepository): Response
    {
        return $this->render('genre/index.html.twig', [
            'genres' => $genreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'genre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        // check if is admin
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('genre_index');
        }

        $genre = new Genre();
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($genre);
            $entityManager->flush();
            $this->addFlash(
                'Success',
                'Your gender was added successfully !'
            );
            return $this->redirectToRoute('genre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('genre/new.html.twig', [
            'genre' => $genre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'genre_show', methods: ['GET'])]
    public function show(Genre $genre): Response
    {
        return $this->render('genre/show.html.twig', [
            'genre' => $genre,
            'livres' => $genre->getLivres(),
        ]);
    }

    #[Route('/{id}/edit', name: 'genre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Genre $genre, EntityManagerInterface $entityManager): Response
    {

        // check if is admin
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('genre_index');
        }

        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash(
                'Success',
                'Your gender was updated successfully !'
            );
            return $this->redirectToRoute('genre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('genre/edit.html.twig', [
            'genre' => $genre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'genre_delete', methods: ['POST'])]
    public function delete(Request $request, Genre $genre, EntityManagerInterface $entityManager): Response
    {

        // check if is admin
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('genre_index');
        }

        // check if genre is used
        if ($genre->getLivres()->count() > 0) {
            $this->addFlash(
                'Error',
                'You can\'t delete this genre because it is used by some books !'
            );
            return $this->redirectToRoute('genre_index', [], Response::HTTP_SEE_OTHER);
        }

        if ($this->isCsrfTokenValid('delete'.$genre->getId(), $request->request->get('_token'))) {
            $entityManager->remove($genre);
            $entityManager->flush();
            $this->addFlash(
                'Warning',
                'Your gender was deleted successfully !'
            );
        }

        return $this->redirectToRoute('genre_index', [], Response::HTTP_SEE_OTHER);
    }
}
