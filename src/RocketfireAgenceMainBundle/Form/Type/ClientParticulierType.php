<?php

namespace RocketfireAgenceMainBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;

class ClientParticulierType extends ClientType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('prenom');
    }
}
