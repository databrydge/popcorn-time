<?php

namespace App\Controller;

use App\Interface\Repository\MovieRepositoryInterface;
use App\Interface\Repository\ReviewRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    public function __construct(
        private ReviewRepositoryInterface $reviewRepository,
        private MovieRepositoryInterface  $movieRepository,
    ) {
    }

    #[Route('/')]
    public function index(): Response
    {
        // ToDo: Get Latest info from Database
        $latestMovies = $this->movieRepository->getLatestMovies();
        $latestReviews = $this->reviewRepository->getLatestReviews();

        return $this->render('index.html.twig', [
            'latestMovies' => $latestMovies,
            'latestReviews' => $latestReviews,
        ]);
    }
}