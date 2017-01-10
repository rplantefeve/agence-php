<?php

namespace RocketfireAgenceMainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use RocketfireAgenceMainBundle\Entity\Vol;

/**
 * Description of LoadVolClass.
 */
class LoadVolClass extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $volOne = new Vol();
        $date = new \DateTime('2016-10-01 15:01:02');
        $date2 = new \DateTime('2016-10-01 17:06:54');
        $volOne->setDateDepartVol($date);
        $volOne->setDateArriveeVol($date2);
        $volOne->setHeureDepartVol($date);
        $volOne->setHeureArriveeVol($date2);
        $volOne->setAeroportDepart($this->getReference('aeroport-one'));
        $volOne->setAeroportArrivee($this->getReference('aeroport-two'));

        $volTwo = new Vol();
        $date = new \DateTime('2017-02-16 07:54:02');
        $date2 = new \DateTime('2017-02-16 23:59:54');
        $volTwo->setDateDepartVol($date);
        $volTwo->setDateArriveeVol($date2);
        $volTwo->setHeureDepartVol($date);
        $volTwo->setHeureArriveeVol($date2);
        $volTwo->setAeroportDepart($this->getReference('aeroport-two'));
        $volTwo->setAeroportArrivee($this->getReference('aeroport-one'));

        $manager->persist($volOne);
        $manager->persist($volTwo);
        $manager->flush();

        $this->addReference('vol-one', $volOne);
        $this->addReference('vol-two', $volTwo);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
    // the lower the number, the sooner that this fixture is loaded
    return 10;
    }
}
