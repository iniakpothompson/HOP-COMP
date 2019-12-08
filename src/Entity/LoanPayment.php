<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * LoanPayment
 *
 * @ORM\Table(name="loan_payment")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *  @ORM\Entity(repositoryClass="App\Repository\LoanPaymentRepository")
 */
class LoanPayment
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
     * @ORM\Column(name="repayment_plan", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $repaymentPlan;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_installmental_amount", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $paymentInstallmentalAmount;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="start_payingback_date", type="datetime", nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $startPayingbackDate;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="payment_status", type="datetime", nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $paymentStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="end_payingback_date", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $endPayingbackDate;

    /**
     * @var \Employees
     * @ORM\OneToOne(targetEntity="Employees")
     *   @ORM\JoinColumn(name="Employees_id", referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $employees;

    /**
     * @var \Loan
     * @ORM\OneToOne(targetEntity="Loan")
     *   @ORM\JoinColumn(name="Loan_id", referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $loan;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Loan", inversedBy="loanPayment")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $loans;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepaymentPlan(): ?string
    {
        return $this->repaymentPlan;
    }

    public function setRepaymentPlan(string $repaymentPlan): self
    {
        $this->repaymentPlan = $repaymentPlan;

        return $this;
    }

    public function getPaymentInstallmentalAmount(): ?string
    {
        return $this->paymentInstallmentalAmount;
    }

    public function setPaymentInstallmentalAmount(string $paymentInstallmentalAmount): self
    {
        $this->paymentInstallmentalAmount = $paymentInstallmentalAmount;

        return $this;
    }

    public function getStartPayingbackDate(): ?\DateTimeInterface
    {
        return $this->startPayingbackDate;
    }

    public function setStartPayingbackDate(\DateTimeInterface $startPayingbackDate): self
    {
        $this->startPayingbackDate = $startPayingbackDate;

        return $this;
    }

    public function getPaymentStatus(): ?\DateTimeInterface
    {
        return $this->paymentStatus;
    }

    public function setPaymentStatus(\DateTimeInterface $paymentStatus): self
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    public function getEndPayingbackDate(): ?string
    {
        return $this->endPayingbackDate;
    }

    public function setEndPayingbackDate(string $endPayingbackDate): self
    {
        $this->endPayingbackDate = $endPayingbackDate;

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

    public function getLoan(): ?Loan
    {
        return $this->loan;
    }

    public function setLoan(?Loan $loan): self
    {
        $this->loan = $loan;

        return $this;
    }

    public function getLoans(): ?Loan
    {
        return $this->loans;
    }

    public function setLoans(?Loan $loans): self
    {
        $this->loans = $loans;

        return $this;
    }


}
