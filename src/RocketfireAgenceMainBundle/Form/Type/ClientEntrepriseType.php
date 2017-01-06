<?php

namespace RocketfireAgenceMainBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
<<<<<<< HEAD:src/RocketfireAgenceMainBundle/Form/ClientEntrepriseType.php
use RocketfireAgenceMainBundle\Form\ClientType;
=======
use Symfony\Component\OptionsResolver\OptionsResolver;
use RocketfireAgenceMainBundle\Form\Type\ClientType;
>>>>>>> feature/Vol:src/RocketfireAgenceMainBundle/Form/Type/ClientEntrepriseType.php

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
