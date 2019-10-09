<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Service\AdminService;

use App\DTO\AddCategoryForm;
use App\DTO\AddPhotoForm;
use App\DTO\AddPhotoshootForm;
use App\DTO\AddSinglePhotoForm;
use App\Entity\Photoshoot;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface AdminPanelAddServiceInterface
{
    public function addPhotoshoot(AddPhotoshootForm $form): Photoshoot;
    public function addImages(UploadedFile $image, Photoshoot $photoshoot);
    public function addImage(AddPhotoForm $form, int $id);
    public function addCategory(AddCategoryForm $form);
    public function addSingleImage(AddSinglePhotoForm $form);
}
