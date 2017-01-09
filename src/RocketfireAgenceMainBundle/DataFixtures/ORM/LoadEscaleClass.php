<?php

namespace RocketfireAgenceMainBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use RocketfireAgenceMainBundle\Entity\Escale;

/**
 * Description of LoadEscaleClass.
 *
 * @author Seme
 */
class LoadEscaleClass extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $escaleOne = new Escale();
        $datedeb = new \DateTime('2017-01-01 08:12:00');
        $datefin = new \DateTime('2017-01-02 18:47:12');
        $escaleOne->setDateDepartEscale($datedeb);
        $escaleOne->setHeureDepartEscale($datedeb);
        $escaleOne->setDateArriveeEscale($datefin);
        $escaleOne->setHeureArriveeEscale($datefin);
        $escaleOne->setIdAeroport($this->getReference('aeroport-two'));
        $escaleOne->setIdVol($this->getReference('vol-two'));

        $escaleTwo = new Escale();
        $datedeb = new \DateTime('2017-01-12 11:34:00');
        $datefin = new \DateTime('2017-01-12 17:17:17');
        $escaleTwo->setDateDepartEscale($datedeb);
        $escaleTwo->setHeureDepartEscale($datedeb);
        $escaleTwo->setDateArriveeEscale($datefin);
        $escaleTwo->setHeureArriveeEscale($datefin);
        $escaleTwo->setIdAeroport($this->getReference('aeroport-one'));
        $escaleTwo->setIdVol($this->getReference('vol-two'));

        $escaleThree = new Escale();
        $datedeb = new \DateTime('2017-01-04 19:18:00');
        $datefin = new \DateTime('2017-01-05 01:24:00');
        $escaleThree->setDateDepartEscale($datedeb);
        $escaleThree->setHeureDepartEscale($datedeb);
        $escaleThree->setDateArriveeEscale($datefin);
        $escaleThree->setHeureArriveeEscale($datefin);
        $escaleThree->setIdAeroport($this->getReference('aeroport-one'));
        $escaleThree->setIdVol($this->getReference('vol-one'));

        $manager->persist($escaleOne);
        $manager->persist($escaleTwo);
        $manager->persist($escaleThree);
        $manager->flush();

        /* useless
        $this->addReference('escale-one', $escaleOne);
        $this->addReference('escale-two', $escaleTwo);
        $this->addReference('escale-three', $escaleThree);
         *
         */
    }

    public function getOrder()
    {
        return 12;
    }
}
