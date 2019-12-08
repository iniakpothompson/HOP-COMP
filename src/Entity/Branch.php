<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Branch
 *
 * @ORM\Table(name="branch")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\BranchRepository")
 */
class Branch
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
     * @ORM\Column(name="branch_name", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $branchName;

    /**
     * @var string
     *
     * @ORM\Column(name="town", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $town;

    /**
     * @var string
     *
     * @ORM\Column(name="lga", type="string", length=45, nullable=false)
     * @Groups({"insert"})
     */
    private $lga;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBranchName(): ?string
    {
        return $this->branchName;
    }

    public function setBranchName(string $branchName): self
    {
        $this->branchName = $branchName;

        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(string $town): self
    {
        $this->town = $town;

        return $this;
    }

    public function getLga(): ?string
    {
        return $this->lga;
    }

    public function setLga(string $lga): self
    {
        $this->lga = $lga;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }


}
