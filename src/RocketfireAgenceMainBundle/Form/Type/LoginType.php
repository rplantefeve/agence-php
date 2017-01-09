<?php

namespace RocketfireAgenceMainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class LoginType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('login', TextType::class,
                        [
                    'label_format' => 'label.login'])
                ->add('motDePasse', RepeatedType::class,
                        [
                    'type'           => PasswordType::class,
                    'first_options'  => [
                        'label_format' => 'label.password'],
                    'second_options' => [
                        'label_format' => 'label.passwordConfirmation']])
                ->add('admin', CheckboxType::class,
                        [
                    'label_format' => 'label.administrator',
                    'required'     => false])
                ->add('isActive', CheckboxType::class,
                        [
                    'label_format' => 'label.active',
                    'required'     => false]);
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
