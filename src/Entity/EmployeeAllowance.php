<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * EmployeeAllowance
 *
 * @ORM\Table(name="employee_allowance")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeAllowanceRepository")
 */
class EmployeeAllowance
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
     * @ORM\Column(name="allowance_type", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $allowanceType;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $amount;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     * @Groups({"insert"})
     */
    private $date;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     * @Groups({"insert"})
     */
    private $dateModified;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Employees", mappedBy="employeeAllowance")
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

    public function getAllowanceType(): ?string
    {
        return $this->allowanceType;
    }

    public function setAllowanceType(string $allowanceType): self
    {
        $this->allowanceType = $allowanceType;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

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

    public function getDateModified(): ?\DateTimeInterface
    {
        return $this->dateModified;
    }

    public function setDateModified(\DateTimeInterface $dateModified): self
    {
        $this->dateModified = $dateModified;

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
            $employee->addEmployeeAllowance($this);
        }

        return $this;
    }

    public function removeEmployee(Employees $employee): self
    {
        if ($this->employee->contains($employee)) {
            $this->employee->removeElement($employee);
            $employee->removeEmployeeAllowance($this);
        }

        return $this;
    }


}
