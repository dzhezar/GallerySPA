<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Service\AdminService;

use Doctrine\Common\Collections\ArrayCollection;

interface CommonInfoServiceInterface
{
    public function setParameter($key, $value);
    public function getParameter($key);
    public function getData(): ArrayCollection;
    public function flush();
}
