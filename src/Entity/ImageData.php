<?php

namespace App\Entity;

use App\Repository\ImageDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageDataRepository::class)
 */
class ImageData
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NbClick;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getImageId(): ?string
    {
        return $this->imageId;
    }

    public function setImageId(string $imageId): self
    {
        $this->imageId = $imageId;

        return $this;
    }

    public function getNbClick(): ?int
    {
        return $this->NbClick;
    }

    public function setNbClick(?int $NbClick): self
    {
        $this->NbClick = $NbClick;

        return $this;
    }
}
