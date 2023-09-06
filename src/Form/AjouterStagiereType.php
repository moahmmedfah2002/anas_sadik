<?php

namespace App\Form;

use App\Entity\Stagiaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjouterStagiereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('CIN')
            ->add('Nom')
            ->add('Prenom')
            ->add('D_naissance',DateType::class, array(
                'widget' => 'choice',
                'years' => range(date('Y')-100, date('Y')-10),
                'months' => range(date('m'), 12),
                'days' => range(date('d'), 31),
              ))
            ->add('D_stage',DateType::class, array(
                'widget' => 'choice',
                'years' => range(date('Y')-100, date('Y')),
                'months' => range(date('m'), 12),
                'days' => range(date('d'), 31),
              ))
            ->add('validation')
            ->add('SUB',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stagiaire::class,
        ]);
    }
}
