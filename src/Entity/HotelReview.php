<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * HotelReview
 *
 * @ORM\Table(name="hotel_review")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"hotRev"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *  @ORM\Entity(repositoryClass="App\Repository\HotelReviewRepository")
 */
class HotelReview
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"insert", "hotRev"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reviewer_name", type="string", length=45, nullable=false)
     * @Groups({"insert","hotRev"})
     */
    private $reviewerName;

    /**
     * @var string
     *
     * @ORM\Column(name="rating", type="string", length=45, nullable=false)
     * @Groups({"insert","hotRev"})
     */
    private $rating;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=45, nullable=false)
     * @Groups({"insert","hotRev"})
     */
    private $comment;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     * @Groups({"insert","hotRev"})
     */
    private $date;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\hotels", inversedBy="hotelReviews")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert", "hotRev"})
     */
    private $hotel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GuestOrCustomer")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $guestorCustomer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReviewerName(): ?string
    {
        return $this->reviewerName;
    }

    public function setReviewerName(string $reviewerName): self
    {
        $this->reviewerName = $reviewerName;

        return $this;
    }

    public function getRating(): ?string
    {
        return $this->rating;
    }

    public function setRating(string $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

   

    public function getHotel(): ?hotels
    {
        return $this->hotel;
    }

    public function setHotel(?hotels $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    public function getGuestorCustomer(): ?GuestOrCustomer
    {
        return $this->guestorCustomer;
    }

    public function setGuestorCustomer(?GuestOrCustomer $guestorCustomer): self
    {
        $this->guestorCustomer = $guestorCustomer;

        return $this;
    }


}
