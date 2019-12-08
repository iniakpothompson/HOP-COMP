<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * EmployeeEducationalQualification
 *
 * @ORM\Table(name="employee_educational_qualification")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeEducationQualificationRepository")
 */
class EmployeeEducationalQualification
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
     * @ORM\Column(name="educational_level", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $educationalLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="certificate_obtain", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $certificateObtain;

    /**
     * @var string
     *
     * @ORM\Column(name="school_name", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $schoolName;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="start_date", type="datetime", nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $startDate;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="end_date", type="datetime", nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $endDate;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employees", inversedBy="employeeEducation")
     * @ORM\JoinColumn(nullable=false)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $employee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEducationalLevel(): ?string
    {
        return $this->educationalLevel;
    }

    public function setEducationalLevel(string $educationalLevel): self
    {
        $this->educationalLevel = $educationalLevel;

        return $this;
    }

    public function getCertificateObtain(): ?string
    {
        return $this->certificateObtain;
    }

    public function setCertificateObtain(string $certificateObtain): self
    {
        $this->certificateObtain = $certificateObtain;

        return $this;
    }

    public function getSchoolName(): ?string
    {
        return $this->schoolName;
    }

    public function setSchoolName(string $schoolName): self
    {
        $this->schoolName = $schoolName;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

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
