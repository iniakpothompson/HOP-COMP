<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiSubresource;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\GuestOrCustomer;

/**
 * BlogComment
 *
 * @ORM\Table(name="blog_comment")
 * @ORM\Entity
 *  @ApiResource(
 *     
 
 *     itemOperations={
 *
 *          "get",
            "put"={"access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object.getUser()==user"}
 *     },
 *     collectionOperations={
 *          "post"={"access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object.getUser()", "groups"={"insert"}},
 *          "get"={"normalization_context"={
 *                                      "groups"={"get_comment_with_author","retrieve_blogs"}
 *                                   }},
 *          "api_blogs_blog_coments_get_subresource"={
 *                  "normalization_context"={"groups"={"get_comment_with_author"}}
 *          }
 *     }
 *
 * )
 *
 * @ORM\Entity(repositoryClass="App\Repository\BlogCommentRepository")
 */
class BlogComment implements AuthoredEntityInterface, PublishedDateInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"insert","retrieve_blogs"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     * @Groups({"insert","get_comment_with_author","retrieve_blogs"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=45, nullable=false)
     * @Groups({"insert","get_comment_with_author","retrieve_blogs"})
     */
    private $content;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     * @Groups({"insert","get_comment_with_author","retrieve_blogs"})
     */
    private $publishedDate;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Blog", inversedBy="blogComent")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"retrieve_blogs"})
     */
    private $blog;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="blogComment")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"get_comment_with_author","retrieve_blogs"})
     */
    private $author;

   
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getPublishedDate():\DateTimeInterface
    {
        return $this->publishedDate;
    }

    public function setPublishedDate(\DateTimeInterface $createdDate): PublishedDateInterface
    {
        $this->publishedDate = $createdDate;

        return $this;
    }




    public function getBlog(): ?Blog
    {
        return $this->blog;
    }

    public function setBlog(?Blog $blog): self
    {
        $this->blog = $blog;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
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
