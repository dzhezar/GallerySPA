<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Category\CategoryRepository")
 */
class Category
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
    private $Name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photoshoot", mappedBy="Category")
     */
    private $photoshoots;

    /**
     * @Gedmo\Slug(fields={"Name"})
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_visible;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PhotoshootImage", mappedBy="category")
     */
    private $singleImages;


    public function __construct()
    {
        $this->photoshoots = new ArrayCollection();
        $this->singleImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection|Photoshoot[]
     */
    public function getPhotoshoots(): Collection
    {
        return $this->photoshoots;
    }

    public function addPhotoshoot(Photoshoot $photoshoot): self
    {
        if (!$this->photoshoots->contains($photoshoot)) {
            $this->photoshoots[] = $photoshoot;
            $photoshoot->setCategory($this);
        }

        return $this;
    }

    public function removePhotoshoot(Photoshoot $photoshoot): self
    {
        if ($this->photoshoots->contains($photoshoot)) {
            $this->photoshoots->removeElement($photoshoot);
            // set the owning side to null (unless already changed)
            if ($photoshoot->getCategory() === $this) {
                $photoshoot->setCategory(null);
            }
        }

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

    public function getIsVisible(): ?bool
    {
        return $this->is_visible;
    }

    public function setIsVisible(bool $is_visible): self
    {
        $this->is_visible = $is_visible;

        return $this;
    }

    /**
     * @return Collection|PhotoshootImage[]
     */
    public function getSingleImages(): Collection
    {
        return $this->singleImages;
    }

    public function addSingleImage(PhotoshootImage $singleImage): self
    {
        if (!$this->singleImages->contains($singleImage)) {
            $this->singleImages[] = $singleImage;
            $singleImage->setCategory($this);
        }

        return $this;
    }

    public function removeSingleImage(PhotoshootImage $singleImage): self
    {
        if ($this->singleImages->contains($singleImage)) {
            $this->singleImages->removeElement($singleImage);
            // set the owning side to null (unless already changed)
            if ($singleImage->getCategory() === $this) {
                $singleImage->setCategory(null);
            }
        }

        return $this;
    }
}
