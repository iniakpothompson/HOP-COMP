<?php

namespace App\Entity;

use App\Controller\BlogImageAction;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\HttpFoundation\File\File;

/**
 * BlogPhoto
 *
 * @ORM\Table(name="blog_photo")
 * @ORM\Entity
*  @ApiResource(
 *    
 *     itemOperations={
 *         "get"={"groups"={"getblogimg","retrieve_blogs"}},
 *		   "put"={"groups"={"bid"}}
 *     },
 *     collectionOperations={
 *          "get"={"normalization_context"={"groups"={"retrieve_blogs","get_blog_photos"}}},
 *			"api_blogs_blog_photos_get_subresource"={"normalization_context"={"groups"={"get_blog_photos"}}},
 *         "post"={
 *			"groups"={"postblogimg"},
 *              "controller"=BlogImageAction::class,
 *				"deserialize"=false,
 *              "method"="POST",
 *              "path"="/images/blog_images",
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
 * 
 *
 */
class BlogPhoto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"postblogimg","get_blog_photos"})
     */
    private $id;

    /**
     * @var File|null
     *
     * @Assert\NotNull(groups={"media_object_create"})
     * @Vich\UploadableField(mapping="blog_images", fileNameProperty="filePath")
     * @Groups({"postblogimg","get_blog_photos"})
     */
    public $file;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true)
     * @Groups({"retrieve_blogs","get_blog_photos"})
     */
    public $filePath;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Blog", inversedBy="blogPhotos")
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"insert","get_blog_photos","bid"})
     */
    private $blog;


    public function getId(): ?int
    {
        return $this->id;
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
        return "symfony/images/blog_images/".$this->filePath;
    }

    /**
     * @param string|null $filePath
     */
    public function setFilePath(?string $filePath): void
    {
        $this->filePath = $filePath;
    }


}