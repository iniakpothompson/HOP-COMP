<?php

namespace App\Entity;

use DateTime;
use App\Entity\EmployeeRoll;
use App\Entity\EmployeeBonus;
use App\Entity\EmployeeAddress;
use App\Entity\EmployeeContact;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\EmployeeEducationalQualification;
use Doctrine\Common\Collections\ArrayCollection;
use phpDocumentor\Reflection\Types\String_;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Employees
 *
 * @ORM\Entity
 *  @ApiResource(
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\EmployeesRepository")
 */
class Employees
{
    /**
     * /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=45, nullable=false)
     *  @Groups({"insert","retrieve"})
     * @Assert\NotBlank()
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     * @Assert\NotBlank()
     */
    private $lastName;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="birth_date", type="datetime", nullable=true)
     * @Groups({"insert","retrieve"})
     *
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="marital_status", type="string", length=45, nullable=true)
     *
     * @Groups({"insert","retrieve"})
     */
    private $maritalStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="number_of_children", type="string", length=45, nullable=true)
     * @Groups({"EmployeesRegister"})
     *
     * @Groups({"insert","retrieve"})
     */
    private $numberOfChildren;

    /**
     * @var \EmployeeRoll
     * @ORM\ManyToMany(targetEntity="EmployeeRoll", mappedBy="employees")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     *@Groups({"insert","retrieve"})
     */
    private $employeeRoll;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EmployeeAddress", mappedBy="employees")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $employeeAddress;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EmployeeEducationalQualification", mappedBy="employee", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $employeeEducation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EmployeeContact", mappedBy="employee", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $employeeContact;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EmployeeBonus", inversedBy="employee")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $employeesBonus;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EmployeeAllowance", inversedBy="employee")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $employeeAllowance;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EmployeeDeduction", inversedBy="employee")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $employeeDeduction;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EmployeeWorkExperience", mappedBy="employee", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $employeeWorkExperience;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Faq", mappedBy="employee")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $faqs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\WebAppUpdateableContent", mappedBy="employee")
     * @Groups({"insert","retrieve"})
     */
    private $webAppUpdateableContents;

    /**
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="employee")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;



    public function __construct()
    {
        $this->employeeRoll = new ArrayCollection();
        $this->employeeAddress = new ArrayCollection();
        $this->employeeEducation = new ArrayCollection();
        $this->employeeContact = new ArrayCollection();
        $this->employeesBonus = new ArrayCollection();
        $this->employeeAllowance = new ArrayCollection();
        $this->employeeDeduction = new ArrayCollection();
        $this->employeeWorkExperience = new ArrayCollection();
        $this->faqs = new ArrayCollection();
        $this->webAppUpdateableContents = new ArrayCollection();
    }





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getMaritalStatus(): ?string
    {
        return $this->maritalStatus;
    }

    public function setMaritalStatus(string $maritalStatus): self
    {
        $this->maritalStatus = $maritalStatus;

        return $this;
    }

    public function getNumberOfChildren(): ?string
    {
        return $this->numberOfChildren;
    }

    public function setNumberOfChildren(string $numberOfChildren): self
    {
        $this->numberOfChildren = $numberOfChildren;

        return $this;
    }

    /**
     * @return Collection|EmployeeRoll[]
     */
    public function getEmployeeRoll(): Collection
    {
        return $this->employeeRoll;
    }

    public function addEmployeeRoll(EmployeeRoll $employeeRoll): self
    {
        if (!$this->employeeRoll->contains($employeeRoll)) {
            $this->employeeRoll[] = $employeeRoll;
            $employeeRoll->addEmployee($this);
        }

        return $this;
    }

    public function removeEmployeeRoll(EmployeeRoll $employeeRoll): self
    {
        if ($this->employeeRoll->contains($employeeRoll)) {
            $this->employeeRoll->removeElement($employeeRoll);
            $employeeRoll->removeEmployee($this);
        }

        return $this;
    }

    /**
     * @return Collection|EmployeeAddress[]
     */
    public function getEmployeeAddress(): Collection
    {
        return $this->employeeAddress;
    }

    public function addEmployeeAddress(EmployeeAddress $employeeAddress): self
    {
        if (!$this->employeeAddress->contains($employeeAddress)) {
            $this->employeeAddress[] = $employeeAddress;
            $employeeAddress->setEmployees($this);
        }

        return $this;
    }

    public function removeEmployeeAddress(EmployeeAddress $employeeAddress): self
    {
        if ($this->employeeAddress->contains($employeeAddress)) {
            $this->employeeAddress->removeElement($employeeAddress);
            // set the owning side to null (unless already changed)
            if ($employeeAddress->getEmployees() === $this) {
                $employeeAddress->setEmployees(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|EmployeeEducationalQualification[]
     */
    public function getEmployeeEducation(): Collection
    {
        return $this->employeeEducation;
    }

    public function addEmployeeEducation(EmployeeEducationalQualification $employeeEducation): self
    {
        if (!$this->employeeEducation->contains($employeeEducation)) {
            $this->employeeEducation[] = $employeeEducation;
            $employeeEducation->setEmployee($this);
        }

        return $this;
    }

    public function removeEmployeeEducation(EmployeeEducationalQualification $employeeEducation): self
    {
        if ($this->employeeEducation->contains($employeeEducation)) {
            $this->employeeEducation->removeElement($employeeEducation);
            // set the owning side to null (unless already changed)
            if ($employeeEducation->getEmployee() === $this) {
                $employeeEducation->setEmployee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EmployeeContact[]
     */
    public function getEmployeeContact(): Collection
    {
        return $this->employeeContact;
    }

    public function addEmployeeContact(EmployeeContact $employeeContact): self
    {
        if (!$this->employeeContact->contains($employeeContact)) {
            $this->employeeContact[] = $employeeContact;
            $employeeContact->setEmployee($this);
        }

        return $this;
    }

    public function removeEmployeeContact(EmployeeContact $employeeContact): self
    {
        if ($this->employeeContact->contains($employeeContact)) {
            $this->employeeContact->removeElement($employeeContact);
            // set the owning side to null (unless already changed)
            if ($employeeContact->getEmployee() === $this) {
                $employeeContact->setEmployee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EmployeeBonus[]
     */
    public function getEmployeesBonus(): Collection
    {
        return $this->employeesBonus;
    }

    public function addEmployeesBonus(EmployeeBonus $employeesBonus): self
    {
        if (!$this->employeesBonus->contains($employeesBonus)) {
            $this->employeesBonus[] = $employeesBonus;
        }

        return $this;
    }

    public function removeEmployeesBonus(EmployeeBonus $employeesBonus): self
    {
        if ($this->employeesBonus->contains($employeesBonus)) {
            $this->employeesBonus->removeElement($employeesBonus);
        }

        return $this;
    }

    /**
     * @return Collection|EmployeeAllowance[]
     */
    public function getEmployeeAllowance(): Collection
    {
        return $this->employeeAllowance;
    }

    public function addEmployeeAllowance(EmployeeAllowance $employeeAllowance): self
    {
        if (!$this->employeeAllowance->contains($employeeAllowance)) {
            $this->employeeAllowance[] = $employeeAllowance;
        }

        return $this;
    }

    public function removeEmployeeAllowance(EmployeeAllowance $employeeAllowance): self
    {
        if ($this->employeeAllowance->contains($employeeAllowance)) {
            $this->employeeAllowance->removeElement($employeeAllowance);
        }

        return $this;
    }

    /**
     * @return Collection|EmployeeDeduction[]
     */
    public function getEmployeeDeduction(): Collection
    {
        return $this->employeeDeduction;
    }

    public function addEmployeeDeduction(EmployeeDeduction $employeeDeduction): self
    {
        if (!$this->employeeDeduction->contains($employeeDeduction)) {
            $this->employeeDeduction[] = $employeeDeduction;
        }

        return $this;
    }

    public function removeEmployeeDeduction(EmployeeDeduction $employeeDeduction): self
    {
        if ($this->employeeDeduction->contains($employeeDeduction)) {
            $this->employeeDeduction->removeElement($employeeDeduction);
        }

        return $this;
    }

    /**
     * @return Collection|EmployeeWorkExperience[]
     */
    public function getEmployeeWorkExperience(): Collection
    {
        return $this->employeeWorkExperience;
    }

    public function addEmployeeWorkExperience(EmployeeWorkExperience $employeeWorkExperience): self
    {
        if (!$this->employeeWorkExperience->contains($employeeWorkExperience)) {
            $this->employeeWorkExperience[] = $employeeWorkExperience;
            $employeeWorkExperience->setEmployee($this);
        }

        return $this;
    }

    public function removeEmployeeWorkExperience(EmployeeWorkExperience $employeeWorkExperience): self
    {
        if ($this->employeeWorkExperience->contains($employeeWorkExperience)) {
            $this->employeeWorkExperience->removeElement($employeeWorkExperience);
            // set the owning side to null (unless already changed)
            if ($employeeWorkExperience->getEmployee() === $this) {
                $employeeWorkExperience->setEmployee(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|Faq[]
     */
    public function getFaqs(): Collection
    {
        return $this->faqs;
    }

    public function addFaq(Faq $faq): self
    {
        if (!$this->faqs->contains($faq)) {
            $this->faqs[] = $faq;
            $faq->setEmployee($this);
        }

        return $this;
    }

    public function removeFaq(Faq $faq): self
    {
        if ($this->faqs->contains($faq)) {
            $this->faqs->removeElement($faq);
            // set the owning side to null (unless already changed)
            if ($faq->getEmployee() === $this) {
                $faq->setEmployee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|WebAppUpdateableContent[]
     */
    public function getWebAppUpdateableContents(): Collection
    {
        return $this->webAppUpdateableContents;
    }

    public function addWebAppUpdateableContent(WebAppUpdateableContent $webAppUpdateableContent): self
    {
        if (!$this->webAppUpdateableContents->contains($webAppUpdateableContent)) {
            $this->webAppUpdateableContents[] = $webAppUpdateableContent;
            $webAppUpdateableContent->setEmployee($this);
        }

        return $this;
    }

    public function removeWebAppUpdateableContent(WebAppUpdateableContent $webAppUpdateableContent): self
    {
        if ($this->webAppUpdateableContents->contains($webAppUpdateableContent)) {
            $this->webAppUpdateableContents->removeElement($webAppUpdateableContent);
            // set the owning side to null (unless already changed)
            if ($webAppUpdateableContent->getEmployee() === $this) {
                $webAppUpdateableContent->setEmployee(null);
            }
        }

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function addBlog(BlogComment $blog): self
    {
        if (!$this->blog->contains($blog)) {
            $this->blog[] = $blog;
            $blog->setAuthor($this);
        }

        return $this;
    }

    public function removeBlog(BlogComment $blog): self
    {
        if ($this->blog->contains($blog)) {
            $this->blog->removeElement($blog);
            // set the owning side to null (unless already changed)
            if ($blog->getAuthor() === $this) {
                $blog->setAuthor(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user):self
    {
        $this->user = $user;

        return $this;
    }



}
