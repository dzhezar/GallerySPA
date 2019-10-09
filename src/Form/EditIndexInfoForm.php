<?php

/*
 * This file is part of the "Stylish Portfolio" project.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App\Form;

use App\DTO\IndexInfo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditIndexInfoForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'facebook',
                TextType::class,
                ['required' => false]
            )
            ->add(
                'instagram',
                TextType::class,
                ['required' => false]
            )
            ->add(
                'mail',
                EmailType::class,
                ['required' => false]
            )
            ->add(
                'tumblr',
                TextType::class,
                ['required' => false]
            )
            ->add(
                'mainImg',
                FileType::class,
                ['required' => false]
            )
            ->add(
                'aboutMe',
                TextareaType::class,
                ['attr' =>
                    ['rows' => 3, 'class' => 'summernote'], ]
            )
            ->add('save', SubmitType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => IndexInfo::class,
        ]);
    }
}
