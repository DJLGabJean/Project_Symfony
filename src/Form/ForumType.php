<?php

namespace App\Form;

use App\Entity\Forum;
use App\Entity\Settings;
use App\Entity\Tag;
use Symfony\Component\Validator\Constraints\Count;
use Proxies\__CG__\App\Entity\Videogame;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du Forum',
            ])
            ->add('videogame', EntityType::class, [
                'class' => Videogame::class,
                'choice_label' => 'name',
                'label' => 'Jeu vidéo',
                'required' => true,
            ])
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'choice_label' => 'name',
                'multiple' => true, 
                'expanded' => true, 
                'by_reference' => false,
                'required' => true,
                'constraints' => [
                    new Count(['min' => 1, 'minMessage' => 'Choisissiez au moins un tag.'])
                ]
            ])
            ->add('settings', EntityType::class, [
                'class' => Settings::class,
                'choice_label' => 'id',
                'label' => 'Paramètres',
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Forum::class,
        ]);
    }
}
