<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Form;

use App\DTO\AddPhotoshootForm as AddPhotoshootFormDto;
use App\Entity\Category;
use App\Repository\Category\CategoryRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddPhotoshootForm extends AbstractType
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('category', ChoiceType::class, [
                'choices'  => $this->getCategories(),
                'choice_label' => function ($category) {
                    /* @var Category $category */
                    return $category->getName();
                },
                'placeholder' => 'Choose an option',
            ])
            ->add('shortDescription', TextType::class, [
                'attr' => ['maxlength' => 255],
            ])
            ->add('images', FileType::class, [
                'label' => 'Images',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AddPhotoshootFormDto::class,
        ]);
    }

    private function getCategories()
    {
        $categories = $this->categoryRepository->findAll();
        $array = [];

        foreach ($categories as $category) {
            $photoshoots = $category->getSingleImages();

            if ($photoshoots->isEmpty()) {
                \array_push($array, $category);
            }
        }

        return $array;
    }
}
