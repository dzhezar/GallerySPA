<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\DTO;

class EditIndexInfoForm
{
    private $main_img1;
    private $main_img2;
    private $main_img3;
    private $aboutMe;


    public function __construct(string $aboutMe = null, $main_img1 = null, $main_img2 = null, $main_img3 = null)
    {
        $this->main_img1 = $main_img1;
        $this->main_img2 = $main_img2;
        $this->main_img3 = $main_img3;
        $this->aboutMe = $aboutMe;
    }


    public function getMainImg1()
    {
        return $this->main_img1;
    }


    public function setMainImg1($main_img1): void
    {
        $this->main_img1 = $main_img1;
    }

    public function getMainImg2()
    {
        return $this->main_img2;
    }


    public function setMainImg2($main_img2): void
    {
        $this->main_img2 = $main_img2;
    }


    public function getMainImg3()
    {
        return $this->main_img3;
    }


    public function setMainImg3($main_img3): void
    {
        $this->main_img3 = $main_img3;
    }
    public function getAboutMe(): ?string
    {
        return $this->aboutMe;
    }

    public function setAboutMe(string $aboutMe): void
    {
        $this->aboutMe = $aboutMe;
    }
}
