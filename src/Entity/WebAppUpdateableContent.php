<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * WebAppUpdateableContent
 *
 * @ORM\Table(name="web_app_updateable_content")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *  @ORM\Entity(repositoryClass="App\Repository\WebAppUpdateableContentRepository")
 */
class WebAppUpdateableContent
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
     * @ORM\Column(name="section", type="string", length=45, nullable=false, options={"comment"="section meaning which part does he want to update is it the footer or the header"})
     *@Groups({"insert","retrieve"})
     */
    private $section;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"comment"="this enanble us to know the date the update was made"})
     *@Groups({"insert","retrieve"})
     */
    private $date;



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employees", inversedBy="webAppUpdateableContents")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"insert"})
     */
    private $employee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setSection(string $section): self
    {
        $this->section = $section;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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
