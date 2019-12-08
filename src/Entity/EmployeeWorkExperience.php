<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * EmployeeWorkExperience
 *
 * @ORM\Table(name="employee_work_experience")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeWorkExperienceRepository")
 */
class EmployeeWorkExperience
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
     * @ORM\Column(name="organisation_name", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $organisationName;

    /**
     * @var string
     *
     * @ORM\Column(name="position_held", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $positionHeld;

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
     * @var string
     *
     * @ORM\Column(name="job_description", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $jobDescription;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employees", inversedBy="employeeWorkExperience")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $employee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrganisationName(): ?string
    {
        return $this->organisationName;
    }

    public function setOrganisationName(string $organisationName): self
    {
        $this->organisationName = $organisationName;

        return $this;
    }

    public function getPositionHeld(): ?string
    {
        return $this->positionHeld;
    }

    public function setPositionHeld(string $positionHeld): self
    {
        $this->positionHeld = $positionHeld;

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

    public function getJobDescription(): ?string
    {
        return $this->jobDescription;
    }

    public function setJobDescription(string $jobDescription): self
    {
        $this->jobDescription = $jobDescription;

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
