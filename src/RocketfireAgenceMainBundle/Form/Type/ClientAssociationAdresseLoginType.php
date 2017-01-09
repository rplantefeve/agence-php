<?php

namespace RocketfireAgenceMainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of ClientAdresseType
 *
 * @author admin
 */
class ClientAssociationAdresseLoginType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('client', new ClientAssociationType());
        $builder->add('adresse', new AdresseType());
        $builder->add('login', new LoginType());
    }
}
