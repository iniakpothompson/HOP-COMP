<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ApiResource(
 *
 * )
 */
class User implements UserInterface
{
    const ROLE_ADMIN="ROLE_ADMIN";
    const ROLE_ACCOUNTANT="ROLE_ACCOUNTANT";
    const ROLE_CM="ROLE_CM";
    const ROLE_HO="ROLE_HO";
    const ROLE_HRM="ROLE_HRM";
    const ROLE_CC="ROLE_CC";
    const ROLE_GUEST="ROLE_GUEST";
    const DEFAULT_ROLES=[self::ROLE_GUEST];
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"post_user","get_comment_details","retrieve_a_blog","retrieve_blogs","employee_details"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"admin_get_user","post_user","get_comment_details","retrieve_a_blog","retrieve_blogs","employee_details"})
     */
    private $email;

    /**
     * @ORM\Column(type="simple_array", length=200)
     * @Groups({"admin_get_user","get_user","post_user","employee_details"})
     */
    private $roles;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Groups({"post_user"})
     */
    private $password;

    /**
     * @Groups({"post_user","retrieve_a_blog","retrieve_blogs"})
     * @ORM\OneToOne(targetEntity="App\Entity\Employees", mappedBy="user")
     *
     */
    private $employee;

    /**
     * @Groups({"admin_get_user","post_user"})
     * @ORM\OneToMany(targetEntity="App\Entity\Blog", mappedBy="blogAuthor")
     */
    private $blog;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BlogComment", mappedBy="user")
     */
    private $blogComment;

    public function __construct()
    {
        $this->blog = new ArrayCollection();
        $this->blogComment = new ArrayCollection();
        $this->roles=self::DEFAULT_ROLES;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
//        // guarantee every user at least has ROLE_USER
//        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getEmployee(): ?Employees
    {
        return $this->employee;
    }

    public function setEmployee(Employees $employee): self
    {
        $this->employee = $employee;

        // set the owning side of the relation if necessary
        if ($this !== $employee->getUser()) {
            $employee->setUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Blog[]
     */
    public function getBlog(): Collection
    {
        return $this->blog;
    }

    public function addBlog(Blog $blog): self
    {
        if (!$this->blog->contains($blog)) {
            $this->blog[] = $blog;
            $blog->setBlogAuthor($this);
        }

        return $this;
    }

    public function removeBlog(Blog $blog): self
    {
        if ($this->blog->contains($blog)) {
            $this->blog->removeElement($blog);
            // set the owning side to null (unless already changed)
            if ($blog->getBlogAuthor() === $this) {
                $blog->setBlogAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BlogComment[]
     */
    public function getBlogComment(): Collection
    {
        return $this->blogComment;
    }

    public function addBlogComment(BlogComment $blogComment): self
    {
        if (!$this->blogComment->contains($blogComment)) {
            $this->blogComment[] = $blogComment;
            $blogComment->setUser($this);
        }

        return $this;
    }

    public function removeBlogComment(BlogComment $blogComment): self
    {
        if ($this->blogComment->contains($blogComment)) {
            $this->blogComment->removeElement($blogComment);
            // set the owning side to null (unless already changed)
            if ($blogComment->getUser() === $this) {
                $blogComment->setUser(null);
            }
        }

        return $this;
    }
}
