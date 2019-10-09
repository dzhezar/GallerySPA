<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Service\AdminService;

interface AdminPanelDeleteServiceInterface
{
    public function deletePhotoshoot(int $id);
    public function deleteImage(int $id);
    public function deleteCategory(string $slug);
    public function deleteSinglePhoto(int $id);
}
