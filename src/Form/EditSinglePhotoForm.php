<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Form;

use App\DTO\EditSinglePhotoForm as EditSinglePhotoFormDto;
use App\Entity\Category;
use App\Repository\Category\CategoryRepository;
use App\Repository\PhotoshootImage\PhotoshootImageRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditSinglePhotoForm extends AbstractType
{
    private $categoryRepository;
    private $imageRepository;

    public function __construct(CategoryRepository $categoryRepository, PhotoshootImageRepository $imageRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->imageRepository = $imageRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', ChoiceType::class, [
                'choices'  => $this->getCategories(),
                'choice_label' => function ($category) {
                    /* @var Category $category */
                    return $category->getName();
                },
                'placeholder' => 'Choose an option',
            ])
            ->add('submit', SubmitType::class);
    }

    private function getCategories()
    {
        $categories = $this->categoryRepository->findAll();
        $array = [];

        foreach ($categories as $category) {
            $photoshoots = $category->getPhotoshoots();

            if ($photoshoots->isEmpty()) {
                \array_push($array, $category);
            }
        }

        return $array;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EditSinglePhotoFormDto::class,
        ]);
    }
}
