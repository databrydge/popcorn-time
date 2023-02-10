<?php

namespace App\Interface\Repository;

use App\Entity\Movie;
use Doctrine\Persistence\ObjectRepository;

interface MovieRepositoryInterface extends ObjectRepository
{
    /**
     * @param int $limit
     * @return Movie[]
     */
    public function getLatestMovies(int $limit = 6): array;

    public function getMovieTitleList(): array;
}