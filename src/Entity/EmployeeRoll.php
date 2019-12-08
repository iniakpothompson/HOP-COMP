<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * EmployeeRoll
 *
 * @ORM\Table(name="employee_roll")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeRollRepository")
 */
class EmployeeRoll
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="this is the position table"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"insert"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="roll_type", type="string", length=45, nullable=false, options={"comment"="N.B: the Roll_type will contain the following"})
     *@Groups({"insert","retrieve"})
     */
    private $rollType;

    /**
     * @var \Employees
     * @ORM\ManyToMany(targetEntity="App\Entity\Employees", inversedBy="employeesRoll")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     *
     */
    private $employees;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Salary", mappedBy="emlpoyeeRoll", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $salary;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRollType(): ?string
    {
        return $this->rollType;
    }

    public function setRollType(string $rollType): self
    {
        $this->rollType = $rollType;

        return $this;
    }

    /**
     * @return Collection|Employees[]
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function addEmployee(Employees $employee): self
    {
        if (!$this->employees->contains($employee)) {
            $this->employees[] = $employee;
        }

        return $this;
    }

    public function removeEmployee(Employees $employee): self
    {
        if ($this->employees->contains($employee)) {
            $this->employees->removeElement($employee);
        }

        return $this;
    }

    public function getSalary(): ?Salary
    {
        return $this->salary;
    }

    public function setSalary(Salary $salary): self
    {
        $this->salary = $salary;

        // set the owning side of the relation if necessary
        if ($this !== $salary->getEmlpoyeeRoll()) {
            $salary->setEmlpoyeeRoll($this);
        }

        return $this;
    }

}
