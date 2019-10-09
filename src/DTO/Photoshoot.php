<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\DTO;

use App\Entity\Category;
use App\PhotoshootImage\PhotoshootImageCollection;
use DateTime;

class Photoshoot
{
    private $id;
    private $category;
    private $title;
    private $isPosted;
    private $publicationDate;
    private $images;
    private $slug;

    public function __construct(int $id, Category $category, string $title, bool $isPosted, DateTime $publicationDate, string $slug, PhotoshootImageCollection $images = null)
    {
        $this->id = $id;
        $this->category = $category;
        $this->title = $title;
        $this->isPosted = $isPosted;
        $this->publicationDate = $publicationDate;
        $this->slug = $slug;
        $this->images = $images;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }


    public function isPosted(): bool
    {
        return $this->isPosted;
    }

    public function getPublicationDate(): \DateTime
    {
        return $this->publicationDate;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getImages(): PhotoshootImageCollection
    {
        return $this->images;
    }
}
