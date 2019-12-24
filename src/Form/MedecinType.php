<?php

namespace App\Form;
use DateTime;
use App\Entity\Medecin;
use Doctrine\Migrations\Generator\Generator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class MedecinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('prenom', TextType::class,[
                'attr' => ['placeholder' => 'votre prenom'],
            ])
            ->add('nom', TextType::class,[
                'attr' => ['placeholder' => 'votre nom'],
            ])
            ->add('datenaisse', DateType::class, array(
                'label'=> 'Date de Naissance',
                'widget' => 'single_text'

            ))

            ->add('telephone', TextType::class,[
                'attr' => ['max' => '9'],
                'attr' => ['placeholder' => 'votre telephone'],
            ])
            ->add('service')
            ->add('specialite')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medecin::class,
        ]);
    }
}
