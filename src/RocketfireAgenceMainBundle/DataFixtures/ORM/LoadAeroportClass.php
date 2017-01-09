<?php

namespace RocketfireAgenceMainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use RocketfireAgenceMainBundle\Entity\Aeroport;

/**
 * Description of LoadAeroportClass
 *
 * @author Seme
 */
class LoadAeroportClass extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $aeroportOne = new Aeroport();
        $aeroportOne->setNom("Aeroport One");

        $aeroportTwo = new Aeroport();
        $aeroportTwo->setNom("Aeroport Two");


        $manager->persist($aeroportOne);
        $manager->persist($aeroportTwo);
        $manager->flush();

        $this->addReference('aeroport-one', $aeroportOne);
        $this->addReference('aeroport-two', $aeroportTwo);
    }

    public function getOrder(){
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }

}
