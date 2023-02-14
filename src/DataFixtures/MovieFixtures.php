<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->persist($this->createDeadpoolMovie());
        $manager->persist($this->createCarsMovie());
        $manager->persist($this->createAvatar2Movie());

        $manager->flush();
    }

    private function createDeadpoolMovie(): Movie
    {
        $movie = new Movie();
        $movie->setTitle('Deadpool');
        $movie->setDescription('The origin story of former Special Forces operative turned mercenary Wade Wilson, who, after being subjected to a rogue experiment that leaves him with accelerated healing powers, adopts the alter ego Deadpool. Armed with his new abilities and a dark, twisted sense of humor, Deadpool hunts down the man who nearly destroyed his life.');
        $movie->setBannerImage('https://www.themoviedb.org/t/p/w1920_and_h800_multi_faces/en971MEXui9diirXlogOrPKmsEn.jpg');
        $movie->setProfileImage('https://www.themoviedb.org/t/p/w600_and_h900_bestv2/pcZT1Ouq99dY6J2iGXjMxw16x6o.jpg');
        $movie->setTmdbLink('https://www.themoviedb.org/movie/293660-deadpool');
        $movie->setActors('Ryan Reynolds,Morena Baccarin,Ed Skrein,T.J. Miller,Gina Carano,Leslie Uggams');
        $movie->setContentRating('R');
        $movie->setReleaseDate(new \DateTime('02/11/2016'));
        $movie->setGenres('Action, Adventure, Comedy');
        $movie->setRuntime(108);
        $movie->setTimestamps();

        return $movie;
    }

    private function createCarsMovie(): Movie
    {
        $movie = new Movie();
        $movie->setTitle('Cars');
        $movie->setDescription('Lightning McQueen, a hotshot rookie race car driven to succeed, discovers that life is about the journey, not the finish line, when he finds himself unexpectedly detoured in the sleepy Route 66 town of Radiator Springs. On route across the country to the big Piston Cup Championship in California to compete against two seasoned pros, McQueen gets to know the town\'s offbeat characters.');
        $movie->setBannerImage('https://www.themoviedb.org/t/p/w1920_and_h800_multi_faces/sd4xN5xi8tKRPrJOWwNiZEile7f.jpg');
        $movie->setProfileImage('https://www.themoviedb.org/t/p/w600_and_h900_bestv2/u4G8EkiIBZYx0wEg2xDlXZigTOZ.jpg');
        $movie->setTmdbLink('https://www.themoviedb.org/movie/920-cars');
        $movie->setActors('Owen Wilson,Larry the Cable Guy,Bonnie Hunt,Paul Newman,Tony Shalhoub,Cheech Marin');
        $movie->setContentRating('G');
        $movie->setReleaseDate(new \DateTime('10/05/2006'));
        $movie->setGenres('Animation, Adventure, Comedy, Family');
        $movie->setRuntime(117);
        $movie->setTimestamps();

        return $movie;
    }

    private function createAvatar2Movie(): Movie
    {
        $movie = new Movie();
        $movie->setTitle('Avatar: The Way of Water');
        $movie->setDescription('Set more than a decade after the events of the first film, learn the story of the Sully family (Jake, Neytiri, and their kids), the trouble that follows them, the lengths they go to keep each other safe, the battles they fight to stay alive, and the tragedies they endure.');
        $movie->setBannerImage('https://www.themoviedb.org/t/p/w1920_and_h800_multi_faces/s16H6tpK2utvwDtzZ8Qy4qm5Emw.jpg');
        $movie->setProfileImage('https://www.themoviedb.org/t/p/w600_and_h900_bestv2/t6HIqrRAclMCA60NsSmeqe9RmNV.jpg');
        $movie->setTmdbLink('https://www.themoviedb.org/movie/76600-avatar-the-way-of-water');
        $movie->setActors('Sam Worthington,Zoe Saldaña,Sigourney Weaver,Britain Dalton,Stephen Lang,Jack Champion,Cliff Curtis');
        $movie->setContentRating('PG-13');
        $movie->setReleaseDate(new \DateTime('12/15/2022'));
        $movie->setGenres('Science Fiction, Adventure, Action');
        $movie->setRuntime(192);
        $movie->setTimestamps();

        return $movie;
    }
}