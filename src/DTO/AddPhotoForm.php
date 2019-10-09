<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\DTO;

class AddPhotoForm
{
    private $images;

    public function __construct(array $images = null)
    {
        $this->images = $images;
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function setImages(array $images): void
    {
        $this->images = $images;
    }
}
