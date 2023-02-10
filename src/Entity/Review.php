<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\DBAL\Types\Types;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[ORM\Column]
    private ?DateTime $createdAt = null;

    #[ORM\Column]
    private ?DateTime $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Movie $movie = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?DateTime $reviewDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $score = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reviewAuthorCompany = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function getReviewDate(): ?DateTime
    {
        return $this->reviewDate;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function getReviewAuthorCompany(): ?string
    {
        return $this->reviewAuthorCompany;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    public function setCreatedAt(?DateTime $createdAt = null): void
    {
        $this->createdAt = $createdAt ?? new DateTime();
    }

    public function setUpdatedAt(?DateTime $updatedAt = null): void
    {
        $this->updatedAt = $updatedAt ?? new DateTime();
    }

    public function setMovie(?Movie $movie): void
    {
        $this->movie = $movie;
    }

    public function setReviewDate(?DateTime $reviewDate): void
    {
        $this->reviewDate = $reviewDate;
    }

    public function setScore(?string $score): void
    {
        $this->score = $score;
    }

    public function setReviewAuthorCompany(?string $reviewAuthorCompany): void
    {
        $this->reviewAuthorCompany = $reviewAuthorCompany;
    }

    public function setTimestamps() {
        $this->setCreatedAt();
        $this->setUpdatedAt();
    }
}