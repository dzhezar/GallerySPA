<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Service\HomePage;

interface HomePageServiceInterface
{
    public function getPhotoshoots();
    public function getPhotoshootsByCategory(string $slug);
}
