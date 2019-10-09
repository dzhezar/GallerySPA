<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Controller;

use App\Category\CategoryMapper;
use App\Repository\Category\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route(path="/api/getCategories", name="getCategories")
     *
     * @param CategoryRepository $categoryRepository
     *
     * @return JsonResponse
     */
    public function getCategories(CategoryRepository $categoryRepository): JsonResponse
    {
        $categories = $categoryRepository->findBy(['is_visible' => true]);
        $array = [];

        foreach ($categories as $category) {
            \array_push($array, CategoryMapper::entityToArray($category));
        }

        return new JsonResponse(['categories' => $array]);
    }
}
