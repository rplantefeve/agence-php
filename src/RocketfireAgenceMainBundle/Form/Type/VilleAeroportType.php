<?php

namespace RocketfireAgenceMainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VilleAeroportType extends AbstractType
{
    /**
    * {@inheritdoc}
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('idVille', 'entity', array(
                    'class' => 'RocketfireAgenceMainBundle:Ville',
                    'label' => 'Ville'
                ))
                ->add('idAeroport', 'entity', array(
                    'class' => 'RocketfireAgenceMainBundle:Aeroport',
                    'label' => 'Aeroport'
                ));
    }

    /**
    * {@inheritdoc}
    */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RocketfireAgenceMainBundle\Entity\VilleAeroport'
        ));
    }

    /**
    * {@inheritdoc}
    */
    public function getBlockPrefix()
    {
        return 'rocketfireagencemainbundle_villeaeroport';
    }


}
