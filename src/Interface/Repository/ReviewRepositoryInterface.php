<?php

namespace App\Interface\Repository;

use App\Entity\Review;
use Doctrine\Persistence\ObjectRepository;

interface ReviewRepositoryInterface extends ObjectRepository
{
    /**
     * @param int $limit
     * @return Review[]
     */
    public function getLatestReviews(int $limit = 6): array;
}