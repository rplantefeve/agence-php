<?php

namespace RocketfireAgenceMainBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use RocketfireAgenceMainBundle\Form\ClientType;

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
