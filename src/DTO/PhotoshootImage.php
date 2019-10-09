<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\DTO;

use App\Entity\Category;

class PhotoshootImage
{
    private $photoshoot;
    private $image;
    private $category;

    public function __construct(string $image, Photoshoot $photoshoot = null, Category $category = null)
    {
        $this->photoshoot = $photoshoot;
        $this->image = $image;
        $this->category = $category;
    }

    public function getPhotoshoot(): Photoshoot
    {
        return $this->photoshoot;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
}
