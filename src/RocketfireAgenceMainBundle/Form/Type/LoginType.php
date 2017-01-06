<?php

namespace RocketfireAgenceMainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class LoginType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('login')
                ->add('motDePasse', PasswordType::class)
                ->add('admin', CheckboxType::class, [
                    'label'    => 'Administrateur',
                    'required' => false])
                ->add('isActive', CheckboxType::class, [
                    'label'    => 'Actif',
                    'required' => false]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'RocketfireAgenceMainBundle\Entity\Login'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'rocketfireagencemainbundle_login';
    }

}
