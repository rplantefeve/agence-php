<?php

namespace RocketfireAgenceMainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of ClientAdresseType.
 *
 * @author admin
 */
class ClientParticulierAdresseLoginType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('client', new ClientParticulierType());
        $builder->add('adresse', new AdresseType());
        $builder->add('login', new LoginType());
    }
}
