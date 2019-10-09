<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\DTO;

class IndexInfo
{
    private $facebook;
    private $instagram;
    private $mail;
    private $tumblr;
    private $main_img;
    private $about_me;

    public function __construct($facebook, $instagram, $mail, $tumblr, $about_me, $main_img = null)
    {
        $this->facebook = $facebook;
        $this->instagram = $instagram;
        $this->mail = $mail;
        $this->tumblr = $tumblr;
        $this->main_img = $main_img;
        $this->about_me = $about_me;
    }

    public function getFacebook()
    {
        return $this->facebook;
    }

    public function setFacebook($facebook): void
    {
        $this->facebook = $facebook;
    }

    public function getInstagram()
    {
        return $this->instagram;
    }

    public function setInstagram($instagram): void
    {
        $this->instagram = $instagram;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    public function getTumblr()
    {
        return $this->tumblr;
    }

    public function setTumblr($tumblr): void
    {
        $this->tumblr = $tumblr;
    }

    public function getMainImg()
    {
        return $this->main_img;
    }

    public function setMainImg($main_img): void
    {
        $this->main_img = $main_img;
    }

    public function getAboutMe()
    {
        return $this->about_me;
    }

    public function setAboutMe($about_me): void
    {
        $this->about_me = $about_me;
    }
}
