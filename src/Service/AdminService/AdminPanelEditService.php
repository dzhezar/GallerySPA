<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Service\AdminService;

use App\DTO\EditCategoryForm;
use App\DTO\EditPhotoshootForm;
use App\DTO\EditSinglePhotoForm;
use App\Entity\Category;
use App\Entity\PhotoshootImage;
use App\Repository\Photoshoot\PhotoshootRepository;
use App\Repository\PhotoshootImage\PhotoshootImageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AdminPanelEditService implements AdminPanelEditServiceInderface
{
    private $photoshootRepository;
    private $imageRepository;
    private $em;
    private $targetDirectory;
    private $imagesDirectory;

    public function __construct(PhotoshootRepository $photoshootRepository, PhotoshootImageRepository $imageRepository, EntityManagerInterface $em, $targetDirectory, $imagesDirectory)
    {
        $this->photoshootRepository = $photoshootRepository;
        $this->imageRepository = $imageRepository;
        $this->em = $em;
        $this->targetDirectory = $targetDirectory;
        $this->imagesDirectory = $imagesDirectory;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

    public function getImagesDirectory()
    {
        return $this->imagesDirectory;
    }

    public function editPhotoshoot(int $id, EditPhotoshootForm $form)
    {
        $photoshoot = $this->photoshootRepository->findOneBy(['id' => $id]);
        $photoshoot
            ->setTitle($form->getTitle())
            ->setCategory($form->getCategory());
        $this->em->persist($photoshoot);
        $this->em->flush();
    }

    public function editPhotoshootImages(int $id)
    {
        return $this->imageRepository->findBy(['Photoshoot' => $id]);
    }

    public function editIndexInfo(UploadedFile $file)
    {
        $filename = \sha1(\uniqid()) . '.' . $file->guessExtension();
        $dirFiles = $files = \array_diff(\scandir($this->getTargetDirectory()), ['.', '..']);

        if (empty($dirFiles)) {
            $file->move($this->getTargetDirectory(), $filename);
        } else {
            foreach ($dirFiles as $item) {
                \unlink($this->getTargetDirectory() . '/' . $item);
            }
            $file->move($this->getTargetDirectory(), $filename);
        }

        return $filename;
    }

    public function editCategory(string $slug, EditCategoryForm $form)
    {
        $category = $this->em->getRepository(Category::class)->findOneBy(['slug' => $slug]);
        $category->setName($form->getName())
                 ->setIsVisible($form->IsVisible());
        $this->em->persist($category);
        $this->em->flush();
    }

    public function editSinglePhoto(PhotoshootImage $image, EditSinglePhotoForm $form)
    {
        $old_path = $this->getImagesDirectory() . '/' . $image->getCategory()->getName() . '/' . $image->getImage();
        $new_path = $this->getImagesDirectory() . '/' . $form->getCategory()->getName() . '/' . $image->getImage();
        \rename($old_path, $new_path);
        $image->setCategory($form->getCategory());
        $this->em->persist($image);
        $this->em->flush();
    }
}
