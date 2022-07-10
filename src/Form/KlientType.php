<?php

namespace App\Form;

use App\Entity\Klient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KlientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imie')
            ->add('nazwisko')
            ->add('przyczepa')
            ->add('namiot')
            ->add('samochod')
            ->add('dataPrzyjazdu',DateType::Class,[
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')+5)
]
            )
            ->add('dataOdjazdu',DateType::Class,[
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')+5),
                    ]
            )
            ->add('iloscOsob')
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Klient::class,
        ]);
    }
}
