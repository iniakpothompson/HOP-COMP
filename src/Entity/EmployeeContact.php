<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * EmployeeContact
 *
 * @ORM\Table(name="employee_contact")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeContactRepository")
 */
class EmployeeContact
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
     * @ORM\Column(name="phone_number", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="home_phone_number", type="string", length=45, nullable=true)
     * @Groups({"insert","revieve"})
     */
    private $homePhoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="cellular_number", type="string", length=45, nullable=true)
     * @Groups({"insert"})
     */
    private $cellularNumber;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employees", inversedBy="employeeContact")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $employee;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getHomePhoneNumber(): ?string
    {
        return $this->homePhoneNumber;
    }

    public function setHomePhoneNumber(string $homePhoneNumber): self
    {
        $this->homePhoneNumber = $homePhoneNumber;

        return $this;
    }

    public function getCellularNumber(): ?string
    {
        return $this->cellularNumber;
    }

    public function setCellularNumber(string $cellularNumber): self
    {
        $this->cellularNumber = $cellularNumber;

        return $this;
    }


    public function getEmployee(): ?Employees
    {
        return $this->employee;
    }

    public function setEmployee(?Employees $employee): self
    {
        $this->employee = $employee;

        return $this;
    }


}
