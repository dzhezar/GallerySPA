<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\DTO;

use App\Entity\Category;

class AddSinglePhotoForm
{
    private $images;
    private $category;


    public function __construct($images = null, Category $category = null)
    {
        $this->images = $images;
        $this->category = $category;
    }

    public function setImages($images): void
    {
        $this->images = $images;
    }

    public function setCategory($category): void
    {
        $this->category = $category;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }
}
