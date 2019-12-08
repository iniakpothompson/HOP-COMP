<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Salary
 *
 * @ORM\Table(name="salary")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *  @ORM\Entity(repositoryClass="App\Repository\SalaryRepository")
 */
class Salary
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
     * @ORM\Column(name="basic_salary", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $basicSalary;

    /**
     * @var string
     *
     * @ORM\Column(name="grade_level", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $gradeLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="step", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $step;

    /**
     * @var \Employees
     * @ORM\OneToOne(targetEntity="Employees")
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $employees;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\EmployeeRoll", inversedBy="salary", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $emlpoyeeRoll;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBasicSalary(): ?string
    {
        return $this->basicSalary;
    }

    public function setBasicSalary(string $basicSalary): self
    {
        $this->basicSalary = $basicSalary;

        return $this;
    }

    public function getGradeLevel(): ?string
    {
        return $this->gradeLevel;
    }

    public function setGradeLevel(string $gradeLevel): self
    {
        $this->gradeLevel = $gradeLevel;

        return $this;
    }

    public function getStep(): ?string
    {
        return $this->step;
    }

    public function setStep(string $step): self
    {
        $this->step = $step;

        return $this;
    }

    public function getEmployees(): ?Employees
    {
        return $this->employees;
    }

    public function setEmployees(?Employees $employees): self
    {
        $this->employees = $employees;

        return $this;
    }

    public function getEmlpoyeeRoll(): ?EmployeeRoll
    {
        return $this->emlpoyeeRoll;
    }

    public function setEmlpoyeeRoll(EmployeeRoll $emlpoyeeRoll): self
    {
        $this->emlpoyeeRoll = $emlpoyeeRoll;

        return $this;
    }


}
