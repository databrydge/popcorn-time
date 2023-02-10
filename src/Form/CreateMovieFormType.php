<?php

namespace App\Form;

use App\Entity\Movie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use DateTimeImmutable;

class CreateMovieFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('bannerImage', null,  [
                    'label' => 'Banner Image (url)',
                    'attr' => ['placeholder' => 'https://...']
                ])
            ->add('profileImage', null, [
                    'label' => 'Poster Image (url)',
                    'attr' => ['placeholder' => 'https://...']
                ])
            ->add('tmdbLink', null, [
                'label' => 'The Movie Database link to the movie',
                'attr' => ['placeholder' => 'https://www.themoviedb.org/movie/xxxxxxx-yyyyyy']
            ])
            ->add('actors', null, [
                'label' => 'Actors (comma separated)'
            ])
            ->add('contentRating', null, [
                'attr' => ['placeholder' => 'PG-13, G, ...']
            ])
            ->add('releaseDate', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('productionCompany')
            ->add('genres', null, [
                'label' => 'Genres (comma separated)'
            ])
            ->add('runtime', null, [
                'label' => 'Runtime (# minutes)'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
            'createdAt' => new DateTimeImmutable(),
            'updatedAt' => new DateTimeImmutable()
        ]);
    }
}