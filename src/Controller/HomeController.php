<?php

namespace App\Controller;

use App\Repository\AuteurRepository;
use App\Repository\GenreRepository;
use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;


class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $req, AuteurRepository $auteurRepository, LivreRepository $livreRepository, GenreRepository $genreRepository, PaginatorInterface $paginator): Response
    {
        $livres = $livreRepository->findAll();
        $pagination = $paginator->paginate(
            $livres, $req->query->getInt('page', 1), 4);

        return $this->render('home/index.html.twig', [
            'auteurs' => $auteurRepository->findAll(),
            //'livres' => $livreRepository->findAll(),
            'genres' => $genreRepository->findAll(),
            'totalLivre' => $livreRepository->findCount(),
            'livres' => $pagination
        ]);
    }

    #[Route('/search/{title}', name: 'search_livre')]
    public function search(Request $req, AuteurRepository $auteurRepository, LivreRepository $livreRepository, GenreRepository $genreRepository, PaginatorInterface $paginator): Response
    {
        $title = $req->get('title');
        $livres = $livreRepository->findByTitle($title);
        $pagination = $paginator->paginate(
            $livres, $req->query->getInt('page', 1), 4);

        return $this->render('home/index.html.twig', [
            'auteurs' => $auteurRepository->findAll(),
            'livres' => $pagination,
            'genres' => $genreRepository->findAll(),
            'totalLivre' => $livreRepository->findCount()
        ]);
    }

    #[Route('/search', name: 'search_index')]
    public function searchIndex(): Response
    {
        // redirect to homepage
        return $this->redirectToRoute('home');
    }
}
