<?php

namespace RocketfireAgenceMainBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use RocketfireAgenceMainBundle\Form\Type\ClientType;

class ClientEntrepriseType extends ClientType
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
