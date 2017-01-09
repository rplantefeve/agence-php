<?php

namespace RocketfireAgenceMainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateReservation')->add('numero')->add('etat', ChoiceType::class, [
            'choice_list' => new ChoiceList(
                ['ouvert', 'fermé'],
                ['Ouvert', 'Fermé']
            ),
            ])->add('idVol')->add('idAdd')->add('idPassager');
    }

        /**
         * {@inheritdoc}
         */
        public function configureOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults([
                'data_class' => 'RocketfireAgenceMainBundle\Entity\Reservation',
            ]);
        }

        /**
         * {@inheritdoc}
         */
        public function getBlockPrefix()
        {
            return 'rocketfireagencemainbundle_reservation';
        }
}
