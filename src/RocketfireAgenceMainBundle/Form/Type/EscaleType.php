<?php

namespace RocketfireAgenceMainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EscaleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateDepartEscale')
                ->add('dateArriveeEscale')
                ->add('heureDepartEscale')
                ->add('heureArriveeEscale')
                ->add('idAeroport', 'entity', array(
                    'class' => 'RocketfireAgenceMainBundle:Aeroport',
                    'label' => 'Aeroport'
                ))
                ->add('idVol', 'entity', array(
                    'class' => 'RocketfireAgenceMainBundle:Vol',
                    'label' => 'Vol'

                ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RocketfireAgenceMainBundle\Entity\Escale'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'rocketfireagencemainbundle_escale';
    }


}
