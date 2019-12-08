<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * GuestOrCustomer
 *
 * @ORM\Table(name="guest_or_customer")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\GuestOrCustomerRepository")
 */
class GuestOrCustomer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"insert"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=45, nullable=false)
     * @Groups({"insert"})
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $phoneNumber;


    /**
     * @var string
     *
     * @ORM\Column(name="email_address", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $emailAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $gender;

    /**
     * @var \BlogComment
     * @ORM\oneToMany(targetEntity="App\Entity\BlogComment", mappedBy="guest")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $blogComment;

    function __construct()
    {
        $this->blogComment=new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getBlogComment(): Collection
    {
        return $this->blogComment;
    }

    /**
     *
     * @return Collection
     */
    public function setBlogComment(): Collection
    {
        $this->blogComment;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
    

    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function addBlogComment(BlogComment $blogComment): self
    {
        if (!$this->blogComment->contains($blogComment)) {
            $this->blogComment[] = $blogComment;
            $blogComment->setGuest($this);
        }

        return $this;
    }

    public function removeBlogComment(BlogComment $blogComment): self
    {
        if ($this->blogComment->contains($blogComment)) {
            $this->blogComment->removeElement($blogComment);
            // set the owning side to null (unless already changed)
            if ($blogComment->getGuest() === $this) {
                $blogComment->setGuest(null);
            }
        }

        return $this;
    }


}
