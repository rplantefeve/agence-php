<?php

namespace RocketfireAgenceMainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class LoginEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('login', TextType::class,
                        [
                    'attr' => [
                        'readonly' => true, ], ])
                ->add('motDePasse', PasswordType::class,
                        [
                    'required' => true, ])
                ->add('admin', CheckboxType::class,
                        [
                    'label' => 'Administrateur',
                    'required' => false, ])
                ->add('active', CheckboxType::class,
                        [
                    'label' => 'Actif',
                    'required' => false, ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'RocketfireAgenceMainBundle\Entity\Login',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'rocketfireagencemainbundle_login';
    }
}
