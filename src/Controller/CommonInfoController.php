<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Controller;

use App\Service\AdminService\CommonInfoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CommonInfoController extends AbstractController
{

    /**
     * @Route(path="/api/getMainImg", name="getMainImg")
     *
     * @param CommonInfoService $commonInfoService
     *
     * @return JsonResponse
     */
    public function getMainImg(CommonInfoService $commonInfoService): JsonResponse
    {
        $mainImg = $commonInfoService->getParameter('main_img');

        return new JsonResponse([
            'main_img' => $mainImg,
        ]);
    }

    /**
     * @Route(path="/api/getSocialLinks", name="getSocialLinks")
     *
     * @param CommonInfoService $commonInfoService
     *
     * @return JsonResponse
     */
    public function getSocialLinks(CommonInfoService $commonInfoService): JsonResponse
    {
        $links['instagram'] = $commonInfoService->getParameter('instagram');
        $links['tumblr'] = $commonInfoService->getParameter('tumblr');
        $links['facebook'] = $commonInfoService->getParameter('facebook');
        $links['mail'] = $commonInfoService->getParameter('mail');

        return new JsonResponse(['links' => $links]);
    }
}
