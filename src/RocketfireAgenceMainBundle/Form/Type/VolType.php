<?php

namespace RocketfireAgenceMainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use RocketfireAgenceMainBundle\Entity\Aeroport;

class VolType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateDepartVol')
                ->add('dateArriveeVol')
                ->add('heureDepartVol')
                ->add('heureArriveeVol')
                ->add('idAeroportDepart','entity', array(
                    'class' => 'RocketfireAgenceMainBundle:Aeroport',
                    'label'=>'Aeroport de Départ'))
                ->add('idAeroportArrivee','entity', array(
                    'class' => 'RocketfireAgenceMainBundle:Aeroport',
                    'label'=>'Aeroport d\'Arrivée'));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'RocketfireAgenceMainBundle\Entity\Vol',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'rocketfireagencemainbundle_vol';
    }
}
