<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bannerImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profileImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tmdbLink = null;

    #[ORM\Column]
    private ?DateTime $createdAt = null;

    #[ORM\Column]
    private ?DateTime $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'movie', targetEntity: Review::class, orphanRemoval: true)]
    private Collection $reviews;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $actors = null;

    #[ORM\Column(length: 12, nullable: true)]
    private ?string $contentRating = null;

    #[ORM\Column(nullable: true)]
    private ?DateTime $releaseDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $productionCompany = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $genres = null;

    #[ORM\Column(nullable: true)]
    private ?int $runtime = null;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

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

    public function getBannerImage(): ?string
    {
        return $this->bannerImage ?? '/assets/img/defaults/banner.jpg';
    }

    public function getProfileImage(): ?string
    {
        return $this->profileImage ?? sprintf('/assets/img/defaults/poster%s.jpg', random_int(1,3));
    }

    public function getTmdbLink(): ?string
    {
        return $this->tmdbLink;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function getActors(): ?string
    {
        return $this->actors;
    }

    public function getContentRating(): ?string
    {
        return $this->contentRating;
    }

    public function getReleaseDate(): ?DateTime
    {
        return $this->releaseDate;
    }

    public function getProductionCompany(): ?string
    {
        return $this->productionCompany;
    }

    public function getGenres(): ?string
    {
        return $this->genres;
    }

    public function getRuntime(): ?int
    {
        return $this->runtime;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setMovie($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getMovie() === $this) {
                $review->setMovie(null);
            }
        }

        return $this;
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

    public function setBannerImage(?string $bannerImage): void
    {
        $this->bannerImage = $bannerImage;
    }

    public function setProfileImage(?string $profileImage): void
    {
        $this->profileImage = $profileImage;
    }

    public function setTmdbLink(?string $tmdbLink): void
    {
        $this->tmdbLink = $tmdbLink;
    }

    public function setCreatedAt(?DateTime $createdAt = null): void
    {
        $this->createdAt = $createdAt ?? new DateTime();
    }

    public function setUpdatedAt(?DateTime $updatedAt = null): void
    {
        $this->updatedAt = $updatedAt ?? new DateTime();
    }

    public function setReviews(Collection $reviews): void
    {
        $this->reviews = $reviews;
    }

    public function setActors(?string $actors): void
    {
        $this->actors = $actors;
    }

    public function setContentRating(?string $contentRating): void
    {
        $this->contentRating = $contentRating;
    }

    public function setReleaseDate(?DateTime $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function setProductionCompany(?string $productionCompany): void
    {
        $this->productionCompany = $productionCompany;
    }

    public function setGenres(?string $genres): void
    {
        $this->genres = $genres;
    }

    public function setRuntime(?int $runtime): void
    {
        $this->runtime = $runtime;
    }

    public function setTimestamps() {
        $this->setCreatedAt();
        $this->setUpdatedAt();
    }

    public function getReadableRuntime(): string
    {
        $readableRuntime = Carbon::now()->subMinutes($this->getRuntime());
        return $readableRuntime->diffForHumans(
            syntax: CarbonInterface::DIFF_ABSOLUTE,
            short: true,
            parts: 2
        );
    }

    public function fill(array $arr): void
    {
        $properties = get_object_vars($this);
        foreach ($properties as $name => $currentValue) {
            $this->$name = $arr[$name] ?? null;
        }
    }
}