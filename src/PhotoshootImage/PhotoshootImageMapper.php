<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\PhotoshootImage;

use App\Category\CategoryMapper;
use App\DTO\EditSinglePhotoForm;
use App\DTO\PhotoshootImage as PhotoshootImageDto;
use App\Entity\PhotoshootImage;
use App\Photoshot\PhotoshootMapper;

class PhotoshootImageMapper
{
    public function entityToDto(PhotoshootImage $entity): PhotoshootImageDto
    {
        $photoshootMapper = new PhotoshootMapper();
        $categoryMapper = new CategoryMapper();

        return new PhotoshootImageDto(
            $entity->getImage(),
            $photoshootMapper->entityToDtoWithoutImages($entity->getPhotoshoot()),
            $entity->getCategory()
        );
    }

    public function entityToDtoWithoutPhotoshoot(PhotoshootImage $entity): PhotoshootImageDto
    {
        return new PhotoshootImageDto(
            $entity->getImage()
        );
    }

    public function entityToEditDto(PhotoshootImage $entity): EditSinglePhotoForm
    {
        return new EditSinglePhotoForm(
            $entity->getCategory()
        );
    }

    public function entityToSinglePhotoDto(PhotoshootImage $entity): PhotoshootImageDto
    {
        return new PhotoshootImageDto(
            $entity->getImage(),
            null,
            $entity->getCategory()
        );
    }

    public static function entityToArray(PhotoshootImage $entity): array
    {
        $array['image'] = $entity->getImage();

        if ($entity->getCategory()) {
            $array['category'] = $entity->getCategory()->getName();
        } elseif ($entity->getPhotoshoot()) {
            $array['photoshoot'] = $entity->getPhotoshoot()->getId();
        }

        return $array;
    }
}
