<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Service\AdminService;

use App\DTO\AddCategoryForm;
use App\DTO\AddPhotoForm;
use App\DTO\AddPhotoshootForm;
use App\DTO\AddSinglePhotoForm;
use App\Entity\Category;
use App\Entity\Photoshoot;
use App\Entity\PhotoshootImage;
use App\Repository\Photoshoot\PhotoshootRepository;
use App\Repository\PhotoshootImage\PhotoshootImageRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AdminPanelAddService implements AdminPanelAddServiceInterface
{
    private $photoshootRepository;
    private $imageRepository;
    private $em;
    private $targetDirectory;

    public function __construct(PhotoshootRepository $photoshootRepository, PhotoshootImageRepository $imageRepository, EntityManagerInterface $em, $targetDirectory)
    {
        $this->photoshootRepository = $photoshootRepository;
        $this->imageRepository = $imageRepository;
        $this->em = $em;
        $this->targetDirectory = $targetDirectory;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

    public function addPhotoshoot(AddPhotoshootForm $form): Photoshoot
    {
        $photoshoot = new Photoshoot();
        $photoshoot
            ->setTitle($form->getTitle())
            ->setCategory($form->getCategory())
            ->setIsPosted(false)
            ->setPublicationDate(new DateTime());
        $this->em->persist($photoshoot);
        $this->em->flush();

        return $photoshoot;
    }

    public function addImages(UploadedFile $image, Photoshoot $photoshoot)
    {
        $filename = \sha1(\uniqid()) . '.' . $image->guessExtension();
        $path = $this->getTargetDirectory() . '/' . $photoshoot->getId();
        $image->move($path, $filename);

        $photoshootImage = new PhotoshootImage();
        $photoshootImage
            ->setPhotoshoot($photoshoot)
            ->setImage($filename);
        $this->em->persist($photoshootImage);
        $this->em->flush();
    }

    public function addImage(AddPhotoForm $form, int $id)
    {
        $photoshoot = $this->photoshootRepository->findOneBy(['id' => $id]);
        $images = $form->getImages();

        foreach ($images as $image) {
            $filename = \sha1(\uniqid()) . '.' . $image->guessExtension();
            $path = $this->getTargetDirectory() . '/' . $id;
            $image->move($path, $filename);

            $photoshootImage = new PhotoshootImage();
            $photoshootImage
                ->setPhotoshoot($photoshoot)
                ->setImage($filename);
            $this->em->persist($photoshootImage);
        }
        $this->em->flush();
    }

    public function addCategory(AddCategoryForm $form)
    {
        $category = new Category();
        $category
            ->setName($form->getName())
            ->setIsVisible(true);

        $this->em->persist($category);
        $this->em->flush();
    }

    public function addSingleImage(AddSinglePhotoForm $form)
    {
        foreach ($form->getImages() as $image) {
            $filename = \sha1(\uniqid()) . '.' . $image->guessClientExtension();
            $path = $this->getTargetDirectory() . '/' . $form->getCategory()->getName();
            $image->move($path, $filename);

            $singleImg = new PhotoshootImage();
            $singleImg
                ->setCategory($form->getCategory())
                ->setImage($filename);
            $this->em->persist($singleImg);
        }
        $this->em->flush();
    }
}
