<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * RemarkTable
 *
 * @ORM\Table(name="remark_table")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *  @ORM\Entity(repositoryClass="App\Repository\RemarkTableRepository")
 */
class RemarkTable
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
     * @ORM\Column(name="remark_subject", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $remarkSubject;

    /**
     * @var string
     *
     * @ORM\Column(name="remark_content", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $remarkContent;

    /**
     * @var \Employees
     * @ORM\OneToOne(targetEntity="Employees")
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $employees;

    /**
     * @var \GuestOrCustomer
     * @ORM\OneToOne(targetEntity="GuestOrCustomer")
     *   @ORM\JoinColumn(name="Guest_or_customer_id", referencedColumnName="id")
     */
    private $guestOrCustomer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRemarkSubject(): ?string
    {
        return $this->remarkSubject;
    }

    public function setRemarkSubject(string $remarkSubject): self
    {
        $this->remarkSubject = $remarkSubject;

        return $this;
    }

    public function getRemarkContent(): ?string
    {
        return $this->remarkContent;
    }

    public function setRemarkContent(string $remarkContent): self
    {
        $this->remarkContent = $remarkContent;

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

    public function getGuestOrCustomer(): ?GuestOrCustomer
    {
        return $this->guestOrCustomer;
    }

    public function setGuestOrCustomer(?GuestOrCustomer $guestOrCustomer): self
    {
        $this->guestOrCustomer = $guestOrCustomer;

        return $this;
    }


}
