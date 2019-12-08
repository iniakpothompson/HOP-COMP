<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * BlogAuthor
 *
 * @ORM\Table(name="blog_author")
 * @ORM\Entity
 *  @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\BlogAuthorRepository")
 */
class BlogAuthor
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $blogAuthorId;

    /**
     * @var string
     *
     * @ORM\Column(name="author_name", type="string", length=45, nullable=false)
     *
     */
    private $authorName;

    /**
     * @var string
     *
     * @ORM\Column(name="author_address", type="string", length=45, nullable=false)
     */
    private $authorAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="author_email", type="string", length=45, nullable=false)
     */
    private $authorEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="author_phone_number", type="string", length=45, nullable=false)
     */
    private $authorPhoneNumber;

    public function getBlogAuthorId(): ?int
    {
        return $this->blogAuthorId;
    }

    public function getAuthorName(): ?string
    {
        return $this->authorName;
    }

    public function setAuthorName(string $authorName): self
    {
        $this->authorName = $authorName;

        return $this;
    }

    public function getAuthorAddress(): ?string
    {
        return $this->authorAddress;
    }

    public function setAuthorAddress(string $authorAddress): self
    {
        $this->authorAddress = $authorAddress;

        return $this;
    }

    public function getAuthorEmail(): ?string
    {
        return $this->authorEmail;
    }

    public function setAuthorEmail(string $authorEmail): self
    {
        $this->authorEmail = $authorEmail;

        return $this;
    }

    public function getAuthorPhoneNumber(): ?string
    {
        return $this->authorPhoneNumber;
    }

    public function setAuthorPhoneNumber(string $authorPhoneNumber): self
    {
        $this->authorPhoneNumber = $authorPhoneNumber;

        return $this;
    }


}
