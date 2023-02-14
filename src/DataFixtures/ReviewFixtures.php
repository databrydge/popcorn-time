<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use App\Entity\Review;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReviewFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $repo = $manager->getRepository(Movie::class);
        $movies = $repo->findAll();

        foreach($repo->findAll() as $movie) {
            $reviews = $this->generateReviews($movie);
            foreach($reviews as $review) {
                $manager->persist($review);
            }
        }

        $manager->flush();
    }

    /**
     * @param Movie $movie
     * @return Review[]
     */
    private function generateReviews(Movie $movie): array
    {
        $amountOfReviews = rand(3,7);
        $reviews = [];
        for ($x = 0; $x <= $amountOfReviews; $x++) {
            $review = new Review();
            $review->setTimestamps();
            $review->setTitle(sprintf('%s was a %s movie...', $movie->getTitle(), $this->generateCustomizedReviewPreString()));
            $review->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin leo orci, volutpat eu tortor eget, dignissim gravida nisl. Pellentesque purus justo, iaculis quis augue in, vulputate maximus nulla. Sed lobortis nibh ut risus elementum tempus. Sed nec lacinia mi, et condimentum turpis. Nulla facilisi. Maecenas accumsan, diam eget molestie iaculis, augue elit ultricies est, ac imperdiet nisl dui sed mauris. Duis elit nisl, tincidunt vel fringilla eu, posuere vitae est. Suspendisse potenti. Nullam consequat bibendum euismod. In tincidunt orci a magna pretium commodo. Praesent ut dapibus lorem. Pellentesque congue, nisi ac sodales consectetur, massa est condimentum lacus, vel porta dui eros vel dolor.Nulla pretium tempus sem eget placerat. Nam consequat suscipit turpis, quis tincidunt sapien dapibus id. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus eu porta dolor. Aliquam eget mauris sed sapien aliquam faucibus vel sit amet nunc. Quisque pellentesque feugiat velit, et aliquet magna condimentum nec. In id semper leo, id rutrum magna. Cras maximus, purus et commodo pharetra, quam quam varius tortor, nec gravida ipsum sapien eu turpis. Fusce vulputate convallis ante ac faucibus. Ut mollis condimentum facilisis. Maecenas eleifend sollicitudin dolor, tincidunt vestibulum ligula consectetur in.');
            $review->setAuthor('From the Magical Emporium of Auto-Generated Reviews');
            $review->setReviewAuthorCompany('Mr. Fixer Elixir\'s Magical Emporium of Auto-Generated Reviews');
            $review->setMovie($movie);
            $reviews[] = $review;
        }

        return $reviews;
    }

    private function generateCustomizedReviewPreString(): string
    {
        return sprintf('%s %s', $this->getRandomIntensifier(true), $this->getRandomAdjective());
    }

    private function getRandomAdjective(): string
    {
        $adjectives = [
            'good',
            'super awesome',
            'cheerful',
            'natural',
            'delicate',
            'wacky',
            'mature',
            'squeamish',
            'messy',
            'romantic',
            'complete',
            'wrathful',
            'beautiful',
        ];

        return $adjectives[array_rand($adjectives)];
    }

    private function getRandomIntensifier(bool $chanceForNull = false): ?string
    {
        $intensities = [
            'really',
            'somewhat',
            'very',
            'slightly',
            'seriously',
            'hilariously'
        ];

        $randomEntry = $intensities[array_rand($intensities)];
        if ($chanceForNull && mt_rand(0,2) > 0) {
            $randomEntry = null;
        }

        return $randomEntry;
    }
}