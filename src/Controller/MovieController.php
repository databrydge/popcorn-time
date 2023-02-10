<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\CreateMovieFormType;
use App\Interface\Repository\MovieRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{


    public function __construct(
        private MovieRepositoryInterface $movieRepository,
    ) {
    }

    #[Route('/movies', name: 'movies')]
    public function index(): Response
    {
        // ToDo: Get Movies from Database
        $movies = $this->movieRepository->findAll();

        return $this->render('movies/index.html.twig', [
            'movies' => $movies
        ]);
    }

    #[Route('/movies/details/{movieId}', name: 'movie_details')]
    public function movie(int $movieId): Response
    {
        // ToDo: Get Movie & the last X reviews from Database
        $movie = $this->movieRepository->find($movieId);


        return $this->render('movies/movie.html.twig', [
            'movie' => $movie,
        ]);
    }

    #[Route('/movies/create', name: 'create_movie')]
    public function createMovie(Request $request): Response
    {
        $movie = new Movie();
        $movie->setTimestamps();
        $form = $this->createForm(CreateMovieFormType::class, $movie);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $movie = $form->getData();
            $this->movieRepository->save($movie, true);

            return $this->redirectToRoute('movie_details', ['movieId' => $movie->getId()]);
        }

        return $this->render('movies/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}