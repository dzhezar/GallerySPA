<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Photoshoot\PhotoshootRepository")
 */
class Photoshoot
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PhotoshootImage", mappedBy="Photoshoot", orphanRemoval=true)
     */
    private $photoshootImages;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsPosted;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $PublicationDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="photoshoots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Category;

    /**
     * @Gedmo\Slug(fields={"Title"})
     * @ORM\Column(type="string", length=255)
     */
    private $slug;


    public function __construct()
    {
        $this->photoshotImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }


    /**
     * @return Collection|PhotoshootImage[]
     */
    public function getPhotoshootImages(): Collection
    {
        return $this->photoshootImages;
    }

    public function addPhotoshootImage(PhotoshootImage $photoshootImage): self
    {
        if (!$this->photoshootImages->contains($photoshootImage)) {
            $this->photoshootImages[] = $photoshootImage;
            $photoshootImage->setPhotoshoot($this);
        }

        return $this;
    }

    public function removePhotoshotImage(PhotoshootImage $photoshootImage): self
    {
        if ($this->photoshootImages->contains($photoshootImage)) {
            $this->photoshootImages->removeElement($photoshootImage);
            // set the owning side to null (unless already changed)
            if ($photoshootImage->getPhotoshoot() === $this) {
                $photoshootImage->setPhotoshoot(null);
            }
        }

        return $this;
    }

    public function getIsPosted(): ?bool
    {
        return $this->IsPosted;
    }

    public function setIsPosted(bool $IsPosted): self
    {
        $this->IsPosted = $IsPosted;

        return $this;
    }

    public function getPublicationDate(): ?DateTime
    {
        return $this->PublicationDate;
    }

    public function setPublicationDate(DateTime $PublicationDate): self
    {
        $this->PublicationDate = $PublicationDate;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->Category;
    }

    public function setCategory(?Category $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }
}
