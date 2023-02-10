<?php

namespace App\Form;

use App\Entity\Movie;
use App\Entity\Review;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use DateTimeImmutable;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateReviewFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $currentTime = new DateTimeImmutable();
        $builder
            ->add('title')
            ->add('description', TextareaType::class, [
                'attr' => ['rows' => 8]
            ])
            ->add('author')
            ->add('reviewDate', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('score')
            ->add('reviewAuthorCompany')
            ->add('movie', EntityType::class, [
              'class' => Movie::class,
              'choice_label' => 'title',
              'multiple' => false,
              'expanded' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
            'createdAt' => new DateTimeImmutable(),
            'updatedAt' => new DateTimeImmutable()
        ]);
    }
}