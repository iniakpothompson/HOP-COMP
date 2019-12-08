<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * EmployeePromotion
 *
 * @ORM\Table(name="employee_promotion")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\EmployeePromotionRepository")
 */
class EmployeePromotion
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
     * @ORM\Column(name="old_roll", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $oldRoll;

    /**
     * @var string
     *
     * @ORM\Column(name="new_roll", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $newRoll;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="Employee_Roll_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Groups({"insert"})
     */
    private $employeeRollId;



    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Employees", mappedBy="employeePromotion", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $employee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOldRoll(): ?string
    {
        return $this->oldRoll;
    }

    public function setOldRoll(string $oldRoll): self
    {
        $this->oldRoll = $oldRoll;

        return $this;
    }

    public function getNewRoll(): ?string
    {
        return $this->newRoll;
    }

    public function setNewRoll(string $newRoll): self
    {
        $this->newRoll = $newRoll;

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

    public function getEmployeeRollId(): ?int
    {
        return $this->employeeRollId;
    }



    public function getEmployee(): ?Employees
    {
        return $this->employee;
    }

    public function setEmployee(?Employees $employee): self
    {
        $this->employee = $employee;

        // set (or unset) the owning side of the relation if necessary
        $newEmployeePromotion = $employee === null ? null : $this;
        if ($newEmployeePromotion !== $employee->getEmployeePromotion()) {
            $employee->setEmployeePromotion($newEmployeePromotion);
        }

        return $this;
    }


}
