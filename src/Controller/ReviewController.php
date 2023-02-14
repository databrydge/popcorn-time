<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\CreateReviewFormType;
use App\Interface\Repository\MovieRepositoryInterface;
use App\Interface\Repository\ReviewRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReviewController extends AbstractController
{
    public function __construct(
       private MovieRepositoryInterface $movieRepository,
       private ReviewRepositoryInterface $reviewRepository
    ) {
    }

    #[Route('/movies/{movieId}/reviews', name: 'reviews')]
    public function movieReviews(int $movieId): Response
    {
        $movie = $this->movieRepository->find($movieId);

        return $this->render('reviews/movie.html.twig', [
            'movie' => $movie,
        ]);
    }

    #[Route('/reviews/create', name: 'create_review')]
    public function createReview(Request $request): Response
    {
        $review = new Review();
        $review->setTimestamps();
        $form = $this->createForm(CreateReviewFormType::class, $review);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $review = $form->getData();
            $this->reviewRepository->save($review, true);

            return $this->redirectToRoute('reviews', ['movieId' => $review->getMovie()->getId()]);
        }

        return $this->render('reviews/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}