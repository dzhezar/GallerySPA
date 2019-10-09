<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotoshootImage\PhotoshootImageRepository")
 */
class PhotoshootImage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Photoshoot", inversedBy="photoshootImages")
     */
    private $Photoshoot;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="singleImages")
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotoshoot(): ?Photoshoot
    {
        return $this->Photoshoot;
    }

    public function setPhotoshoot(?Photoshoot $Photoshoot): self
    {
        $this->Photoshoot = $Photoshoot;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
