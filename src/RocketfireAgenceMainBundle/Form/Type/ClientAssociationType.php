<?php

namespace RocketfireAgenceMainBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use RocketfireAgenceMainBundle\Form\Type\ClientType;

class ClientAssociationType extends ClientType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('numFax')->add('siret');
    }
}
