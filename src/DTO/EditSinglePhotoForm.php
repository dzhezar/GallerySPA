<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\DTO;

use App\Entity\Category;

class EditSinglePhotoForm
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }
}
