<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Photoshot;

use App\DTO\EditPhotoshootForm;
use App\DTO\Photoshoot as PhotoshotDto;
use App\Entity\Photoshoot;
use App\PhotoshootImage\PhotoshootImageCollection;
use App\PhotoshootImage\PhotoshootImageMapper;

class PhotoshootMapper
{
    public function entityToDto(Photoshoot $entity): PhotoshotDto
    {
        $imagesMapper = new PhotoshootImageMapper();
        $collection = new PhotoshootImageCollection();
        $images = $entity->getPhotoshootImages();

        foreach ($images as $image) {
            $collection->addPhotoshot($imagesMapper->entityToDtoWithoutPhotoshoot($image));
        }

        return new PhotoshotDto(
            $entity->getId(),
            $entity->getCategory(),
            $entity->getTitle(),
            $entity->getDescription(),
            $entity->getShortDescription(),
            $entity->getPhotographer(),
            $entity->getModel(),
            $entity->getIsPosted(),
            $entity->getPublicationDate(),
            $collection
        );
    }

    public function entityToDtoWithoutImages(Photoshoot $entity): PhotoshotDto
    {
        return new PhotoshotDto(
            $entity->getId(),
            $entity->getCategory(),
            $entity->getTitle(),
            $entity->getDescription(),
            $entity->getShortDescription(),
            $entity->getPhotographer(),
            $entity->getModel(),
            $entity->getIsPosted(),
            $entity->getPublicationDate()
        );
    }

    public function entityToEditFormDto(Photoshoot $entity): EditPhotoshootForm
    {
        return new EditPhotoshootForm(
            $entity->getTitle(),
            $entity->getCategory(),
            $entity->getShortDescription(),
            $entity->getDescription(),
            $entity->getPhotographer(),
            $entity->getModel()
        );
    }
}
