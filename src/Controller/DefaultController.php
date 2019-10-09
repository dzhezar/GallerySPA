<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Controller;

use App\PhotoshootImage\PhotoshootImageCollection;
use App\PhotoshootImage\PhotoshootImageMapper;
use App\Photoshot\PhotoshootCollection;
use App\Photoshot\PhotoshootMapper;
use App\Repository\Category\CategoryRepository;
use App\Repository\Photoshoot\PhotoshootRepository;
use App\Repository\PhotoshootImage\PhotoshootImageRepository;
use App\Service\AdminService\CommonInfoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route(path="/{spa_route}", name="spa", requirements={ "spa_route" = "^(?!.*(api.*|admin.*)$).*" })
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('spa/spa');
    }
//    public function index(CommonInfoService $commonInfoService, PhotoshootImageRepository $imageRepository): Response
//    {
//        $facebook = $commonInfoService->getParameter('facebook');
//        $instagram = $commonInfoService->getParameter('instagram');
//        $mail = $commonInfoService->getParameter('mail');
//        $tumblr = $commonInfoService->getParameter('tumblr');
//        $mainImg = $commonInfoService->getParameter('main_img');
//        $images = $imageRepository->findBy(['Photoshoot' => null]);
//        [$collection, $first] = $this->makeImageCollection($images);
//
//
//
//        return $this->render('carousel.html.twig', [
//            'facebook' => $facebook,
//            'instagram' => $instagram,
//            'mail' => $mail,
//            'tumblr' => $tumblr,
//            'main_img' => $mainImg,
//            'images' => $collection,
//            'first' =>$first,
//        ]);
//    }
//
//    public function showPortfolioCategory(string $category, CategoryRepository $categoryRepository, PhotoshootRepository $photoshootRepository, CommonInfoService $commonInfoService)
//    {
//        $facebook = $commonInfoService->getParameter('facebook');
//        $instagram = $commonInfoService->getParameter('instagram');
//        $mail = $commonInfoService->getParameter('mail');
//        $tumblr = $commonInfoService->getParameter('tumblr');
//        $category = $categoryRepository->findOneBy(['slug' => $category]);
//
//        if (false === $category->getSingleImages()->isEmpty()) {
//            $images = $category->getSingleImages();
//            [$collection,$first] = $this->makeImageCollection($images->toArray());
//
//
//            return $this->render('carousel.html.twig', [
//                'facebook' => $facebook,
//                'instagram' => $instagram,
//                'mail' => $mail,
//                'tumblr' => $tumblr,
//                'images' => $collection,
//                'first' =>$first,
//            ]);
//        }
//        $photoshoots = $photoshootRepository->findBy(['Category' => $category, 'IsPosted' => true]);
//        $collection = new PhotoshootCollection();
//        $mapper = new PhotoshootMapper();
//
//        foreach ($photoshoots as $photoshoot) {
//            $collection->addPhotoshoot($mapper->entityToDto($photoshoot));
//        }
//
//        return $this->render('portfolio.html.twig', [
//            'photoshoots' => $collection,
//            'facebook' => $facebook,
//            'instagram' => $instagram,
//            'mail' => $mail,
//            'tumblr' => $tumblr,
//        ]);
//    }
//
//    public function renderHeader(CategoryRepository $categoryRepository)
//    {
//        $categories = $categoryRepository->findBy(['is_visible' => true]);
//
//        return $this->render('header.html.twig', [
//            'categories' => $categories,
//        ]);
//    }
//
//    private function makeImageCollection(array $images)
//    {
//        $collection = new PhotoshootImageCollection();
//        $mapper = new PhotoshootImageMapper();
//
//        foreach ($images as $image) {
//            $collection->addPhotoshot($mapper->entityToSinglePhotoDto($image));
//        }
//        $first = $collection->shift();
//
//        return [$collection,$first];
//    }
}
