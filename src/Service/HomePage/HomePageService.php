<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Service\HomePage;

use App\Photoshot\PhotoshootCollection;
use App\Photoshot\PhotoshootMapper;
use App\Repository\Category\CategoryRepository;
use App\Repository\Photoshoot\PhotoshootRepository;

class HomePageService implements HomePageServiceInterface
{
    private $photoshootRepository;
    private $categoryRepository;

    public function __construct(PhotoshootRepository $photoshootRepository, CategoryRepository $categoryRepository)
    {
        $this->photoshootRepository = $photoshootRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getPhotoshoots()
    {
        $mainPhotoshoots = $this->photoshootRepository->findBy(['IsPosted' => true], ['PublicationDate' => 'desc']);
        $photoshootMapper = new PhotoshootMapper();
        $collection = new PhotoshootCollection();

        foreach ($mainPhotoshoots as $item) {
            if (true == $item->getCategory()->getIsVisible()) {
                $collection->addPhotoshoot($photoshootMapper->entityToDto($item));
            }
        }

        return $collection;
    }

    public function getPhotoshootsByCategory(string $slug)
    {
        $category = $this->categoryRepository->findOneBy(['slug' => $slug]);
        $photoshoots = $this->photoshootRepository->findBy(['IsPosted' => true, 'Category' => $category], ['PublicationDate' => 'desc'], $count);
        $photoshootMapper = new PhotoshootMapper();
        $collection = new PhotoshootCollection();

        foreach ($photoshoots as $item) {
            if (true == $item->getCategory()->getIsVisible()) {
                $collection->addPhotoshoot($photoshootMapper->entityToDto($item));
            }
        }

        return $collection;
    }
}
