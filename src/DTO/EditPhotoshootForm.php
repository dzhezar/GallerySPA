<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\DTO;

use App\Entity\Category;

class EditPhotoshootForm
{
    private $title;
    private $category;
    private $shortDescription;

    public function __construct(string $title = null, Category $category = null, string $shortDescription = null)
    {
        $this->title = $title;
        $this->category = $category;
        $this->shortDescription = $shortDescription;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }


    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }
}
