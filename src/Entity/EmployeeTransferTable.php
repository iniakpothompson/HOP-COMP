<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * EmployeeTransferTable
 *
 * @ORM\Table(name="employee_transfer_table")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeTransferTableRepository")
 */
class EmployeeTransferTable
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
     * @ORM\Column(name="old_branch", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $oldBranch;

    /**
     * @var string
     *
     * @ORM\Column(name="new_branch", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $newBranch;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $date;

    /**
     * @var \Branch
     *
     * @ORM\OneToOne(targetEntity="Branch")
     *   @ORM\JoinColumn(name="Branch_id", referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $branch;



    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Employees", mappedBy="employeesTransfer", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $employee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOldBranch(): ?string
    {
        return $this->oldBranch;
    }

    public function setOldBranch(string $oldBranch): self
    {
        $this->oldBranch = $oldBranch;

        return $this;
    }

    public function getNewBranch(): ?string
    {
        return $this->newBranch;
    }

    public function setNewBranch(string $newBranch): self
    {
        $this->newBranch = $newBranch;

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

    public function getBranch(): ?Branch
    {
        return $this->branch;
    }

    public function setBranch(?Branch $branch): self
    {
        $this->branch = $branch;

        return $this;
    }


    public function getEmployee(): ?Employees
    {
        return $this->employee;
    }

    public function setEmployee(?Employees $employee): self
    {
        $this->employee = $employee;

        // set (or unset) the owning side of the relation if necessary
        $newEmployeesTransfer = $employee === null ? null : $this;
        if ($newEmployeesTransfer !== $employee->getEmployeesTransfer()) {
            $employee->setEmployeesTransfer($newEmployeesTransfer);
        }

        return $this;
    }


}
