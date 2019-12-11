<?php

namespace App\Entity;
use App\Entity\BlogComment;
use App\Entity\HotelReview;
use App\Entity\HotelFacility;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * Hotels
 *
 * @ORM\Table(name="hotels")
 * @ORM\Entity
 * @ApiFilter(
 *              SearchFilter::class,
 *              properties={
 *                      "hName":"partial"
 *                  
 *                   }
 *          )
 *  @ApiResource(
 *     normalizationContext={"groups"={"hotRev","posthotelimg","hotLoc","retreive_hotels"}},
 *     denormalizationContext={"groups"={"insert","posthotelimg"}},
 *      collectionOperations={
 *                                  "post",
 *                                  
 *									"get"={
 *											"access_control"="is_granted('IS_ATHENTICATED_ANONYMOUSLY')",
 *                                          "normalization_context"={"groups"={
 *															"retreive_hotels","posthotelimg","hloc","hrev","hfac","hcondet","hserv","hinv",
 *															"hpaydet","hpayType","hpayMeth","hRoom","houtBookn","hamen"}},
 *                                           "enable_max_depth"=true
 *                                          }
 *                          },
 * denormalizationContext={
 *						"put"={"groups"={"posthotelimg"}},
 *						"groups"={"posthotelimg","insert_hotel"}}
 * )
 *  @ORM\Entity(repositoryClass="App\Repository\HotelsRepository")
 */
class Hotels
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
     * @ORM\Column(name="h_name", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $hName;

    /**
     * @var string
     *
     * @ORM\Column(name="h_code", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $hCode;

    /**
     * @var string
     *
     * @ORM\Column(name="h_motto", type="string", length=45, nullable=false)
     * @Groups({"insert"})
     */
    private $hMotto;
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\HotelImages")
     * ORM\JoinTable()
     * @ApiSubresource()
     * @Groups({"posthotelimg"})
     */
    private $hImages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HotelReview", mappedBy="hotel")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ApiSubresource()
     * @Groups({"insert","hotRev"})
     */
    private $hotelReviews;

   
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HotelFacility", mappedBy="hotel", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ApiSubresource()
     * @Groups({"insert"})
     */
    private $hotelFacility;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HotelContactTable", mappedBy="hotel", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ApiSubresource()
     * @Groups({"insert"})
     */
    private $hotelContactDetails;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HotelServices", mappedBy="hotel", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ApiSubresource()
     * @Groups({"insert"})
     */
    private $hotelServices;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Invoice", mappedBy="hotel")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ApiSubresource()
     * @Groups({"insert","retrieve"})
     */
    private $invoice;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PaymentDetails", mappedBy="hotel")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ApiSubresource()
     * @Groups({"insert"})
     */
    private $paymentDetails;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PaymentType", inversedBy="hotel")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ApiSubresource()
     * @Groups({"insert"})
     */
    private $paymentType;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PaymentMethod", inversedBy="hotel")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ApiSubresource()
     * @Groups({"insert"})
     */
    private $payMethod;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RoomTypes", mappedBy="hotel", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ApiSubresource()
     * @Groups({"insert"})
     */
    private $roomTypes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MicelaneousCharges", mappedBy="hotel")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ApiSubresource()
     *
     */
    private $miscCharges;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OutsideBooking", mappedBy="hotel")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ApiSubresource()
     * @Groups({"insert"})
     */
    private $outBooking;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AreaOfPresence", inversedBy="hotel")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ApiSubresource()
     * @Groups({"insert"})
     */
    private $levelOfPresence;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Amenity", mappedBy="hotel", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ApiSubresource()
     * @Groups({"insert"})
     */
    private $amenity;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\HotelLocationDetails", inversedBy="hotels")
     */
    private $locations;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\HotelAmenities", mappedBy="hotel")
     */
    private $hAmenities;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\AttractionLocations", mappedBy="hotel")
     */
    private $attractions;

    

    public function __construct()
    {
        $this->hotelReviews = new ArrayCollection();
        $this->hotelLocationDetail = new ArrayCollection();
        $this->hotelFacility = new ArrayCollection();
        $this->hotelContactDetails = new ArrayCollection();
        $this->hotelServices = new ArrayCollection();
        $this->invoice = new ArrayCollection();
        $this->paymentDetails = new ArrayCollection();
        $this->paymentType = new ArrayCollection();
        $this->payMethod = new ArrayCollection();
        
        $this->miscCharges = new ArrayCollection();
        $this->outBooking = new ArrayCollection();
        $this->amenity = new ArrayCollection();
        $this->hImages=new ArrayCollection();
        $this->locations = new ArrayCollection();
        $this->hAmenities = new ArrayCollection();
        $this->attractions = new ArrayCollection();
       
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHName(): ?string
    {
        return $this->hName;
    }

    public function setHName(string $hName): self
    {
        $this->hName = $hName;

        return $this;
    }

    public function getHCode(): ?string
    {
        return $this->hCode;
    }

    public function setHCode(string $hCode): self
    {
        $this->hCode = $hCode;

        return $this;
    }

    public function getHMotto(): ?string
    {
        return $this->hMotto;
    }

    public function setHMotto(string $hMotto): self
    {
        $this->hMotto = $hMotto;

        return $this;
    }

    

    /**
     * @return Collection|HotelReview[]
     */
    public function getHotelReviews(): Collection
    {
        return $this->hotelReviews;
    }

    public function addHotelReview(HotelReview $hotelReview): self
    {
        if (!$this->hotelReviews->contains($hotelReview)) {
            $this->hotelReviews[] = $hotelReview;
            $hotelReview->setHotel($this);
        }

        return $this;
    }

    public function removeHotelReview(HotelReview $hotelReview): self
    {
        if ($this->hotelReviews->contains($hotelReview)) {
            $this->hotelReviews->removeElement($hotelReview);
            // set the owning side to null (unless already changed)
            if ($hotelReview->getHotel() === $this) {
                $hotelReview->setHotel(null);
            }
        }

        return $this;
    }

    

    /**
     * @return Collection|HotelFacility[]
     */
    public function getHotelFacility(): Collection
    {
        return $this->hotelFacility;
    }

    public function addHotelFacility(HotelFacility $hotelFacility): self
    {
        if (!$this->hotelFacility->contains($hotelFacility)) {
            $this->hotelFacility[] = $hotelFacility;
            $hotelFacility->setHotel($this);
        }

        return $this;
    }

    public function removeHotelFacility(HotelFacility $hotelFacility): self
    {
        if ($this->hotelFacility->contains($hotelFacility)) {
            $this->hotelFacility->removeElement($hotelFacility);
            // set the owning side to null (unless already changed)
            if ($hotelFacility->getHotel() === $this) {
                $hotelFacility->setHotel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HotelContactTable[]
     */
    public function getHotelContactDetails(): Collection
    {
        return $this->hotelContactDetails;
    }

    public function addHotelContactDetail(HotelContactTable $hotelContactDetail): self
    {
        if (!$this->hotelContactDetails->contains($hotelContactDetail)) {
            $this->hotelContactDetails[] = $hotelContactDetail;
            $hotelContactDetail->setHotel($this);
        }

        return $this;
    }

    public function removeHotelContactDetail(HotelContactTable $hotelContactDetail): self
    {
        if ($this->hotelContactDetails->contains($hotelContactDetail)) {
            $this->hotelContactDetails->removeElement($hotelContactDetail);
            // set the owning side to null (unless already changed)
            if ($hotelContactDetail->getHotel() === $this) {
                $hotelContactDetail->setHotel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HotelServices[]
     */
    public function getHotelServices(): Collection
    {
        return $this->hotelServices;
    }

    public function addHotelService(HotelServices $hotelService): self
    {
        if (!$this->hotelServices->contains($hotelService)) {
            $this->hotelServices[] = $hotelService;
            $hotelService->setHotel($this);
        }

        return $this;
    }

    public function removeHotelService(HotelServices $hotelService): self
    {
        if ($this->hotelServices->contains($hotelService)) {
            $this->hotelServices->removeElement($hotelService);
            // set the owning side to null (unless already changed)
            if ($hotelService->getHotel() === $this) {
                $hotelService->setHotel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Invoice[]
     */
    public function getInvoice(): Collection
    {
        return $this->invoice;
    }

    public function addInvoice(Invoice $invoice): self
    {
        if (!$this->invoice->contains($invoice)) {
            $this->invoice[] = $invoice;
            $invoice->setHotel($this);
        }

        return $this;
    }

    public function removeInvoice(Invoice $invoice): self
    {
        if ($this->invoice->contains($invoice)) {
            $this->invoice->removeElement($invoice);
            // set the owning side to null (unless already changed)
            if ($invoice->getHotel() === $this) {
                $invoice->setHotel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PaymentDetails[]
     */
    public function getPaymentDetails(): Collection
    {
        return $this->paymentDetails;
    }

    public function addPaymentDetail(PaymentDetails $paymentDetail): self
    {
        if (!$this->paymentDetails->contains($paymentDetail)) {
            $this->paymentDetails[] = $paymentDetail;
            $paymentDetail->setHotel($this);
        }

        return $this;
    }

    public function removePaymentDetail(PaymentDetails $paymentDetail): self
    {
        if ($this->paymentDetails->contains($paymentDetail)) {
            $this->paymentDetails->removeElement($paymentDetail);
            // set the owning side to null (unless already changed)
            if ($paymentDetail->getHotel() === $this) {
                $paymentDetail->setHotel(null);
            }
        }

        return $this;
    }



    /**
     * @return Collection|PaymentType[]
     */
    public function getPaymentType(): Collection
    {
        return $this->paymentType;
    }

    public function addPaymentType(PaymentType $paymentType): self
    {
        if (!$this->paymentType->contains($paymentType)) {
            $this->paymentType[] = $paymentType;
        }

        return $this;
    }

    public function removePaymentType(PaymentType $paymentType): self
    {
        if ($this->paymentType->contains($paymentType)) {
            $this->paymentType->removeElement($paymentType);
        }

        return $this;
    }

    /**
     * @return Collection|PaymentMethod[]
     */
    public function getPayMethod(): Collection
    {
        return $this->payMethod;
    }

    public function addPayMethod(PaymentMethod $payMethod): self
    {
        if (!$this->payMethod->contains($payMethod)) {
            $this->payMethod[] = $payMethod;
        }

        return $this;
    }

    public function removePayMethod(PaymentMethod $payMethod): self
    {
        if ($this->payMethod->contains($payMethod)) {
            $this->payMethod->removeElement($payMethod);
        }

        return $this;
    }

    

    /**
     * @return Collection|MicelaneousCharges[]
     */
    public function getMiscCharges(): Collection
    {
        return $this->miscCharges;
    }

    public function addMiscCharge(MicelaneousCharges $miscCharge): self
    {
        if (!$this->miscCharges->contains($miscCharge)) {
            $this->miscCharges[] = $miscCharge;
            $miscCharge->setHotel($this);
        }

        return $this;
    }

    public function removeMiscCharge(MicelaneousCharges $miscCharge): self
    {
        if ($this->miscCharges->contains($miscCharge)) {
            $this->miscCharges->removeElement($miscCharge);
            // set the owning side to null (unless already changed)
            if ($miscCharge->getHotel() === $this) {
                $miscCharge->setHotel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OutsideBooking[]
     */
    public function getOutBooking(): Collection
    {
        return $this->outBooking;
    }

    public function addOutBooking(OutsideBooking $outBooking): self
    {
        if (!$this->outBooking->contains($outBooking)) {
            $this->outBooking[] = $outBooking;
            $outBooking->setHotel($this);
        }

        return $this;
    }

    public function removeOutBooking(OutsideBooking $outBooking): self
    {
        if ($this->outBooking->contains($outBooking)) {
            $this->outBooking->removeElement($outBooking);
            // set the owning side to null (unless already changed)
            if ($outBooking->getHotel() === $this) {
                $outBooking->setHotel(null);
            }
        }

        return $this;
    }

    public function getLevelOfPresence(): ?AreaOfPresence
    {
        return $this->levelOfPresence;
    }

    public function setLevelOfPresence(?AreaOfPresence $levelOfPresence): self
    {
        $this->levelOfPresence = $levelOfPresence;

        return $this;
    }

    /**
     * @return Collection|Amenity[]
     */
    public function getAmenity(): Collection
    {
        return $this->amenity;
    }

    public function addAmenity(Amenity $amenity): self
    {
        if (!$this->amenity->contains($amenity)) {
            $this->amenity[] = $amenity;
            $amenity->setHotel($this);
        }

        return $this;
    }

    public function removeAmenity(Amenity $amenity): self
    {
        if ($this->amenity->contains($amenity)) {
            $this->amenity->removeElement($amenity);
            // set the owning side to null (unless already changed)
            if ($amenity->getHotel() === $this) {
                $amenity->setHotel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection
     */
    public function getHImages(): Collection
    {
        return $this->hImages;
    }
    public function addHImages(HotelImages $img){
        $this->hImages=add($img);
    }
    public function removeHImages(HotelImages $img){
        $this->hImages=removeElement($img);
    }

    /**
     * @return Collection|HotelLocationDetails[]
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(HotelLocationDetails $location): self
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
        }

        return $this;
    }

    public function removeLocation(HotelLocationDetails $location): self
    {
        if ($this->locations->contains($location)) {
            $this->locations->removeElement($location);
        }

        return $this;
    }

    /**
     * @return Collection|HotelAmenities[]
     */
    public function getHAmenities(): Collection
    {
        return $this->hAmenities;
    }

    public function addHAmenity(HotelAmenities $hAmenity): self
    {
        if (!$this->hAmenities->contains($hAmenity)) {
            $this->hAmenities[] = $hAmenity;
            $hAmenity->addHotel($this);
        }

        return $this;
    }

    public function removeHAmenity(HotelAmenities $hAmenity): self
    {
        if ($this->hAmenities->contains($hAmenity)) {
            $this->hAmenities->removeElement($hAmenity);
            $hAmenity->removeHotel($this);
        }

        return $this;
    }

    /**
     * @return Collection|AttractionLocations[]
     */
    public function getAttractions(): Collection
    {
        return $this->attractions;
    }

    public function addAttraction(AttractionLocations $attraction): self
    {
        if (!$this->attractions->contains($attraction)) {
            $this->attractions[] = $attraction;
            $attraction->addHotel($this);
        }

        return $this;
    }

    public function removeAttraction(AttractionLocations $attraction): self
    {
        if ($this->attractions->contains($attraction)) {
            $this->attractions->removeElement($attraction);
            $attraction->removeHotel($this);
        }

        return $this;
    }

   


}
