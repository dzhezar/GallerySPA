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
    public static function entityToDto(Photoshoot $entity): PhotoshotDto
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
            $entity->getIsPosted(),
            $entity->getPublicationDate(),
            $entity->getSlug(),
            $collection
        );
    }

    public static function entityToDtoWithoutImages(Photoshoot $entity): PhotoshotDto
    {
        return new PhotoshotDto(
            $entity->getId(),
            $entity->getCategory(),
            $entity->getTitle(),
            $entity->getIsPosted(),
            $entity->getPublicationDate(),
            $entity->getSlug()
        );
    }

    public static function entityToEditFormDto(Photoshoot $entity): EditPhotoshootForm
    {
        return new EditPhotoshootForm(
            $entity->getTitle(),
            $entity->getCategory()
        );
    }

    public static function entityToArray(Photoshoot $entity): array
    {
        $photoshoots = $entity->getPhotoshootImages();
        $array = [];

        foreach ($photoshoots as $photoshoot) {
            \array_push($array, PhotoshootImageMapper::entityToArray($photoshoot));
        }
        $first = \array_shift($array);

        return [
            'id' => $entity->getId(),
            'category' => $entity->getCategory()->getName(),
            'title' => $entity->getTitle(),
            'slug' => $entity->getSlug(),
            'first' => $first,
            'photos' => $array,
        ];
    }
}
