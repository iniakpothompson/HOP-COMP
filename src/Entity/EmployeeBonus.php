<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * EmployeeBonus
 *
 * @ORM\Table(name="employee_bonus")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeBonusRepository")
 */
class EmployeeBonus
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
     * @ORM\Column(name="bonus_type", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $bonusType;

    /**
     * @var string
     *
     * @ORM\Column(name="bonus_amount", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $bonusAmount;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     * @Groups({"insert"})
     */
    private $date;



    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Employees", mappedBy="employeesBonus")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $employee;

    public function __construct()
    {
        $this->employee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBonusType(): ?string
    {
        return $this->bonusType;
    }

    public function setBonusType(string $bonusType): self
    {
        $this->bonusType = $bonusType;

        return $this;
    }

    public function getBonusAmount(): ?string
    {
        return $this->bonusAmount;
    }

    public function setBonusAmount(string $bonusAmount): self
    {
        $this->bonusAmount = $bonusAmount;

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


    /**
     * @return Collection|Employees[]
     */
    public function getEmployee(): Collection
    {
        return $this->employee;
    }

    public function addEmployee(Employees $employee): self
    {
        if (!$this->employee->contains($employee)) {
            $this->employee[] = $employee;
            $employee->addEmployeesBonus($this);
        }

        return $this;
    }

    public function removeEmployee(Employees $employee): self
    {
        if ($this->employee->contains($employee)) {
            $this->employee->removeElement($employee);
            $employee->removeEmployeesBonus($this);
        }

        return $this;
    }


}
