<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiSubresource;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Blog
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity
 *  @ApiResource(
 *     itemOperations={
 *                        "get"={
 *                                 "groups"={"get_blog_photos"}
 *                              },
 *                        "put"={
 *                                  "access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object.getBlogAuthor()==user"
 									
 *                              }
 *                      },
 *

 *                         collectionOperations={
 *                                                      "post"={
 *                                                                  
 																	"denormalization-context"={"groups"={"insert"}}
 *                                                              },
 *                                                       "get"={
 *                                                                  "normalization_context"={"groups"={"retrieve_blogs","get_blog_photos"}},
 *                                                                  
 *                                                              }
 *
 *                                                   }
 *
 *
 *
 *
 *     
 *     )
 * @ORM\Entity(repositoryClass="App\Repository\BlogRepository")
 */
class Blog implements AuthoredEntityInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"insert","retrieve_a_blog","get_blog_photos"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="blog_title", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve_a_blog","retrieve_blogs","get_blog_photos"})
     */
    private $blogTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="blog_content", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve_a_blog","get_blog_photos"})
     */
    private $blogContent;


    /**
     * @var DateTime
     * @Groups({"insert","retreive_blogs"})
     * @ORM\Column(name="date_modified", type="datetime", nullable=true)
     */
    private $dateModified;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BlogComment", mappedBy="blog", orphanRemoval=false)
     * * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     * @ApiSubresource()
     * @Groups({"retrieve_blogs"})
     */
    private $blogComent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BlogPhoto", mappedBy="blog", orphanRemoval=false)
     * @ApiSubresource()
     * @Groups({"retrieve_blogs","get_blog_photos"})
     */
    private $blogPhotos;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="blog")
     * @ORM\JoinColumn(nullable=false)
     *@GROUPS({"retrieve_blogs","get_comment_details"})
     */
    private $author;

    public function __construct()
    {
        $this->blogComent = new ArrayCollection();
        $this->blogPhotos = new ArrayCollection();
    }

   
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param Employees $blogAuthor
     * @return Employees
     */
    public function setBlog(Employees $blogAuthor): Employees
    {
        $this->id = $blogAuthor;
    }

    public function getBlogTitle(): ?string
    {
        return $this->blogTitle;
    }

    public function setBlogTitle(string $blogTitle): self
    {
        $this->blogTitle = $blogTitle;

        return $this;
    }

    public function getBlogContent(): ?string
    {
        return $this->blogContent;
    }

    public function setBlogContent(string $blogContent): self
    {
        $this->blogContent = $blogContent;

        return $this;
    }



    public function getDateModified(): ?\DateTimeInterface
    {
        return $this->dateModified;
    }

    public function setDateModified(\DateTimeInterface $dateModified): self
    {
        $this->dateModified = $dateModified;

        return $this;
    }


    /**
     * @return Collection|BlogComment[]
     */
    public function getBlogComent(): Collection
    {
        return $this->blogComent;
    }

    public function addBlogComent(BlogComment $blogComent): self
    {
        if (!$this->blogComent->contains($blogComent)) {
            $this->blogComent[] = $blogComent;
            $blogComent->setBlog($this);
        }

        return $this;
    }

    public function removeBlogComent(BlogComment $blogComent): self
    {
        if ($this->blogComent->contains($blogComent)) {
            $this->blogComent->removeElement($blogComent);
            // set the owning side to null (unless already changed)
            if ($blogComent->getBlog() === $this) {
                $blogComent->setBlog(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BlogPhoto[]
     */
    public function getBlogPhotos(): Collection
    {
        return $this->blogPhotos;
    }

    public function addBlogPhoto(BlogPhoto $blogPhoto): self
    {
        if (!$this->blogPhotos->contains($blogPhoto)) {
            $this->blogPhotos[] = $blogPhoto;
            $blogPhoto->setBlog($this);
        }

        return $this;
    }

    public function removeBlogPhoto(BlogPhoto $blogPhoto): self
    {
        if ($this->blogPhotos->contains($blogPhoto)) {
            $this->blogPhotos->removeElement($blogPhoto);
            // set the owning side to null (unless already changed)
            if ($blogPhoto->getBlog() === $this) {
                $blogPhoto->setBlog(null);
            }
        }

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(UserInterface $author): AuthoredEntityInterface
    {
        $this->author = $author;

        return $this;
    }


    
}
