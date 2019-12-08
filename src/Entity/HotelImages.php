<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Controller\HotelImageAction;

/**
 * @ORM\Entity
 * @ApiResource(
 *     normalizationContext={"groups"={"posthotelimg"}},
 *     itemOperations={
 *         "get"={"groups"={"posthotelimg"}}
 *     },
 *     collectionOperations={
 *          "get"={"groups"={"posthotelimg"}},
 *         "post"={
 *			"groups"={"posthotelimg"},
 *              "controller"=HotelImageAction::class,
 *				"deserialize"=false,
 *              "method"="POST",
 *              "path"="/images/hotel_images",
 *              "Defaults"={"_api_receive"=false},
 *
 *				 "openapi_context"={
 *                 "requestBody"={
 *                     "content"={
 *                         "multipart/form-data"={
 *                             "schema"={
 *                                 "type"="object",
 *                                 "properties"={
 *                                     "file"={
 *                                         "type"="string",
 *                                         "format"="binary"
 *                                     }
 *                                 }
 *                             }
 *                         }
 *                     }
 *
 *              }
 *				}
 *         }
 *		}
 *
 * )
 * @Vich\Uploadable()
 */
class HotelImages
{
    /**
     * @var int|null
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     * @ORM\Id
     */
    protected $id;


    /**
     * @var File|null
     *
     * @Assert\NotNull(groups={"media_object_create"})
     * @Vich\UploadableField(mapping="hotel_images", fileNameProperty="filePath")
     * @Groups({"posthotelimg"})
     */
    public $file;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true)
     * @Groups({"posthotelimg"})
     */
    public $filePath;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */


    /**
     * @return File|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param File|null $file
     */
    public function setFile(?File $file): void
    {
        $this->file = $file;

    }

    /**
     * @return string|null
     */
    public function getFilePath(): ?string
    {
        return "/images/hotel_images/".$this->filePath;
    }

    /**
     * @param string|null $filePath
     */
    public function setFilePath(?string $filePath): void
    {
        $this->filePath = $filePath;
    }
}