<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Loan
 *
 * @ORM\Table(name="loan")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *  @ORM\Entity(repositoryClass="App\Repository\LoanRepository")
 */
class Loan
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
     * @ORM\Column(name="amount", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_issued", type="datetime", nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $dateIssued;



    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Employees", inversedBy="loan", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $employee;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LoanPayment", mappedBy="loans", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $loanPayment;

    public function __construct()
    {
        $this->loanPayment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateIssued(): ?\DateTimeInterface
    {
        return $this->dateIssued;
    }

    public function setDateIssued(\DateTimeInterface $dateIssued): self
    {
        $this->dateIssued = $dateIssued;

        return $this;
    }


    public function getEmployee(): ?Employees
    {
        return $this->employee;
    }

    public function setEmployee(Employees $employee): self
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * @return Collection|LoanPayment[]
     */
    public function getLoanPayment(): Collection
    {
        return $this->loanPayment;
    }

    public function addLoanPayment(LoanPayment $loanPayment): self
    {
        if (!$this->loanPayment->contains($loanPayment)) {
            $this->loanPayment[] = $loanPayment;
            $loanPayment->setLoans($this);
        }

        return $this;
    }

    public function removeLoanPayment(LoanPayment $loanPayment): self
    {
        if ($this->loanPayment->contains($loanPayment)) {
            $this->loanPayment->removeElement($loanPayment);
            // set the owning side to null (unless already changed)
            if ($loanPayment->getLoans() === $this) {
                $loanPayment->setLoans(null);
            }
        }

        return $this;
    }


}
