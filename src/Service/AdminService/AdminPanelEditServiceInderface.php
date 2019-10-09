<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Service\AdminService;

use App\DTO\EditCategoryForm;
use App\DTO\EditPhotoshootForm;
use App\DTO\EditSinglePhotoForm;
use App\Entity\PhotoshootImage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface AdminPanelEditServiceInderface
{
    public function editPhotoshoot(int $id, EditPhotoshootForm $form);
    public function editPhotoshootImages(int $id);
    public function editIndexInfo(UploadedFile $file);
    public function editCategory(string $slug, EditCategoryForm $form);
    public function editSinglePhoto(PhotoshootImage $image, EditSinglePhotoForm $form);
}
