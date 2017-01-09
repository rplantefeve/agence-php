<?php

namespace RocketfireAgenceMainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use RocketfireAgenceMainBundle\Entity\Login;

/**
 * Description of LoadLoginClass.
 *
 * @author Seme
 */
class LoadLoginClass implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $loginOne = new Login();
        $loginOne->setAdmin(false);
        $loginOne->setActive(true);
        $loginOne->setLogin('j.dupont@gmail.com');
        // the 'security.password_encoder' service requires Symfony 2.6 or higher
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($loginOne, 'lolilol');
        $loginOne->setMotDePasse($password);

        $loginTwo = new Login();
        $loginTwo->setAdmin(true);
        $loginTwo->setActive(true);
        $loginTwo->setLogin('larrybambelle@gmail.com');
        $password = $encoder->encodePassword($loginTwo, 'zzzZZZ');
        $loginTwo->setMotDePasse($password);

        $manager->persist($loginOne);
        $manager->persist($loginTwo);
        $manager->flush();
    }
}
