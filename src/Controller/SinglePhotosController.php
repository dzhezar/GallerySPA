<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Controller;

use App\Entity\Category;
use App\PhotoshootImage\PhotoshootImageMapper;
use App\Photoshot\PhotoshootMapper;
use App\Repository\PhotoshootImage\PhotoshootImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SinglePhotosController extends AbstractController
{
    /**
     * @Route(path="/api/getSinglePhotos", name="getSinglePhotos")
     *
     * @param PhotoshootImageRepository $imageRepository
     * @param PhotoshootImageMapper $imageMapper
     *
     * @return JsonResponse
     */
    public function getMainSinglePhotos(PhotoshootImageRepository $imageRepository, PhotoshootImageMapper $imageMapper): JsonResponse
    {
        $images = $imageRepository->findBy(['Photoshoot' => null]);
        $array = [];

        foreach ($images as $image) {
            \array_push($array, $imageMapper->entityToArray($image));
        }
        $first = \array_shift($array);

        return new JsonResponse(['images' => $array,'first' => $first]);
    }

    /**
     * @Route(path="/api/getSinglePhotos/{slug}", name="getSinglePhotos")
     *
     * @param Category $category
     * @param PhotoshootImageRepository $imageRepository
     * @param PhotoshootImageMapper $imageMapper
     *
     * @return JsonResponse
     */
    public function getPhotosByCategory(Category $category, PhotoshootImageRepository $imageRepository, PhotoshootImageMapper $imageMapper)
    {
        $shoots = [];
        $array = [];

        if ($category->getSingleImages()->isEmpty()) {
            $photoshoots = $category->getPhotoshoots();

            foreach ($photoshoots as $photoshoot) {
                if ($photoshoot->getIsPosted()) {
                    \array_push($shoots, PhotoshootMapper::entityToArray($photoshoot));
                }
            }

            return new JsonResponse(['photoshoots' => $shoots]);
        }
         
        $images = $imageRepository->findBy(['category' => $category]);

        foreach ($images as $image) {
            \array_push($array, $imageMapper->entityToArray($image));
        }
        $first = \array_shift($array);

        return new JsonResponse(['images' => $array, 'first' => $first]);
    }
}
