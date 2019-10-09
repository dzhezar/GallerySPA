<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\IndexInfo;

use App\DTO\IndexInfo;

class IndexInfoMapper
{
    public static function arrayToDto(array $service): IndexInfo
    {
        return new IndexInfo(
            $service['facebook'],
            $service['instagram'],
            $service['mail'],
            $service['tumblr'],
            $service['about_me']
        );
    }
    public static function DtoToArray(IndexInfo $commonInfoDTO): array
    {
        $service = [];
        $service['facebook'] = $commonInfoDTO->getFacebook();
        $service['instagram'] = $commonInfoDTO->getInstagram();
        $service['mail'] = $commonInfoDTO->getMail();
        $service['tumblr'] = $commonInfoDTO->getTumblr();
        $service['about_me'] = $commonInfoDTO->getAboutMe();

        return $service;
    }
}
