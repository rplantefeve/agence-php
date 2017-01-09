<?php

namespace RocketfireAgenceMainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use RocketfireAgenceMainBundle\Entity\CompagnieAerienneVol;

/**
 * Description of LoadCompagnieAerienneVolClass
 *
 * @author Seme
 */
class LoadCompagnieAerienneVolClass extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $compagnieAerienneVolOne = new CompagnieAerienneVol();
        $compagnieAerienneVolOne->setNumero(666);
        $compagnieAerienneVolOne->setOuvert(true);
        $compagnieAerienneVolOne->setIdCompagnie($this->getReference('compagnie-aerienne-one'));
        $compagnieAerienneVolOne->setIdVol($this->getReference('vol-one'));
        
        $compagnieAerienneVolTwo = new CompagnieAerienneVol();
        $compagnieAerienneVolTwo->setNumero(815);
        $compagnieAerienneVolTwo->setOuvert(false);
        $compagnieAerienneVolTwo->setIdCompagnie($this->getReference('compagnie-aerienne-two'));
        $compagnieAerienneVolTwo->setIdVol($this->getReference('vol-two'));
        
        $compagnieAerienneVolThree = new CompagnieAerienneVol();
        $compagnieAerienneVolThree->setNumero(314159);
        $compagnieAerienneVolThree->setOuvert(true);
        $compagnieAerienneVolThree->setIdCompagnie($this->getReference('compagnie-aerienne-six'));
        $compagnieAerienneVolThree->setIdVol($this->getReference('vol-two'));

        $manager->persist($compagnieAerienneVolOne);
        $manager->persist($compagnieAerienneVolTwo);
        $manager->persist($compagnieAerienneVolThree);
        $manager->flush();
    }

    /**
     * Pour l'ordre de chargement
     * @return int
     */
    public function getOrder() {
        return 11;
    }

}
