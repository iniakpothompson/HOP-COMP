<?php

namespace App\Entity;

use DateTime;
use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Employees
 *
 * @ORM\Entity
 *  @ApiResource(
 *     itemOperations={"get"},
 *    collectionOperations={
*          "get"={"groups"={"retrieve"}},
 *          "post"={"groups"={"insert"}}
 * }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\EmployeesRepository")
 */
class Employees
{
    /**
     * /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=45, nullable=false)
     *  @Groups({"insert","retrieve"})
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="birth_date", type="datetime", nullable=true)
     * @Groups({"insert","retrieve"})
     *
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="marital_status", type="string", length=45, nullable=true)
     *
     * @Groups({"insert","retrieve"})
     */
    private $maritalStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="number_of_children", type="string", length=45, nullable=true)
     * @Groups({"EmployeesRegister"})
     *
     * @Groups({"insert","retrieve"})
     */
    private $numberOfChildren;

    /**
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="employee")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getMaritalStatus(): ?string
    {
        return $this->maritalStatus;
    }

    public function setMaritalStatus(string $maritalStatus): self
    {
        $this->maritalStatus = $maritalStatus;

        return $this;
    }

    public function getNumberOfChildren(): ?string
    {
        return $this->numberOfChildren;
    }

    public function setNumberOfChildren(string $numberOfChildren): self
    {
        $this->numberOfChildren = $numberOfChildren;

        return $this;
    }
    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user):self
    {
        $this->user = $user;

        return $this;
    }



}
