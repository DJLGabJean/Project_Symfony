<?php

namespace App\Form;

use App\Entity\Forum;
use App\Entity\Settings;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Event\PreSetDataEvent;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'label' => 'Date',
                'data' => new \DateTime(),
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('state', ChoiceType::class, [
                'label' => 'État',
                'choices' => [
                    'Publique' => 'Publique',
                    'Privée' => 'Privée',
                ],
                'required' => true,
            ])
            ->add('theme', ChoiceType::class, [
                'label' => 'Thème',
                'choices' => [
                    'Light' => 'light',
                    'Dark' => 'dark',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('allowComments', ChoiceType::class, [
                'label' => 'Autoriser les commentaires',
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'required' => false,
            ])
            ->add('forum', EntityType::class, [
                'class' => Forum::class,
                'choice_label' => 'name',
                'label' => 'Forum',
            ])
            ->addEventListener(
                FormEvents::PRE_SET_DATA,
                [$this, 'AddAssociatedForumInfoField']
            );
        }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Settings::class,
        ]);
    }

    public function AddAssociatedForumInfoField(PreSetDataEvent $event): void
    {
        $settings = $event->getData();
        $form = $event->getForm();

        // Vérifiez si un forum est sélectionné
        if ($settings && $settings->getForum()) {
            // Ajoutez un champ texte non lié pour afficher l'information
            $form->add('associated_forum_info', TextType::class, [
                'label' => 'Forum associé',
                'mapped' => false,
                'disabled' => true,
                'data' => 'Forum associé: ' . $settings->getForum()->getName(),
            ]);
        }
    }
}
