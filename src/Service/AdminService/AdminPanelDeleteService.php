<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Service\AdminService;

use App\Repository\Category\CategoryRepository;
use App\Repository\Photoshoot\PhotoshootRepository;
use App\Repository\PhotoshootImage\PhotoshootImageRepository;
use Doctrine\ORM\EntityManagerInterface;

class AdminPanelDeleteService implements AdminPanelDeleteServiceInterface
{
    private $photoshootRepository;
    private $imageRepository;
    private $categoryRepository;
    private $em;
    private $targetDirectory;

    public function __construct(PhotoshootRepository $photoshootRepository, PhotoshootImageRepository $imageRepository, CategoryRepository $categoryRepository, EntityManagerInterface $em, $targetDirectory)
    {
        $this->photoshootRepository = $photoshootRepository;
        $this->imageRepository = $imageRepository;
        $this->categoryRepository = $categoryRepository;
        $this->em = $em;
        $this->targetDirectory = $targetDirectory;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

    public function deletePhotoshoot(int $id)
    {
        $photoshoot = $this->photoshootRepository->findOneBy(['id' => $id]);
        $images = $this->imageRepository->findBy(['Photoshoot' => $photoshoot]);

        foreach ($images as $image) {
            \unlink($this->getTargetDirectory() . '/' . $photoshoot->getId() . '/' . $image->getImage());
            $this->em->remove($image);
        }
        $this->em->flush();
//        \rmdir($this->getTargetDirectory() . '/' . $photoshoot->getId());
        $this->em->remove($photoshoot);
        $this->em->flush();
    }

    public function deleteImage(int $id)
    {
        $image = $this->imageRepository->findOneBy(['id' => $id]);
        \unlink($this->getTargetDirectory() . '/' . $image->getPhotoshoot()->getId() . '/' . $image->getImage());
        $this->em->remove($image);
        $this->em->flush();

        return $image->getPhotoshoot()->getId();
    }

    public function deleteCategory(string $slug)
    {
        $category = $this->categoryRepository->findOneBy(['slug' => $slug]);
        $this->em->remove($category);
        $this->em->flush();
    }

    public function deleteSinglePhoto(int $id)
    {
        $image = $this->imageRepository->findOneBy(['id' => $id]);
        \unlink($this->getTargetDirectory() . '/' . $image->getCategory()->getName() . '/' . $image->getImage());
        $this->em->remove($image);
        $this->em->flush();
    }
}
