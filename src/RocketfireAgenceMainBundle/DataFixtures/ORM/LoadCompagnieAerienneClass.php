<?php

namespace RocketfireAgenceMainBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use RocketfireAgenceMainBundle\Entity\CompagnieAerienne;

/**
 * Description of LoadCompagnieAerienneClass
 *
 * @author Seme
 */
class LoadCompagnieAerienneClass extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }
    /**
     * Renseignement de 10 enregistrements
     * $CompagnieAerienne 1 à 10 -> nom
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager) {
        $CompagnieAerienne1 = new CompagnieAerienne();
        $CompagnieAerienne1->setNom("Alsair");

        $CompagnieAerienne2 = new CompagnieAerienne();
        $CompagnieAerienne2->setNom("Air Antilles Express");

        $CompagnieAerienne3 = new CompagnieAerienne();
        $CompagnieAerienne3->setNom("Aigle Azur");

        $CompagnieAerienne4 = new CompagnieAerienne();
        $CompagnieAerienne4->setNom("Air Austral");

        $CompagnieAerienne5 = new CompagnieAerienne();
        $CompagnieAerienne5->setNom("Air Caraïbes");

        $CompagnieAerienne6 = new CompagnieAerienne();
        $CompagnieAerienne6->setNom("Air France");

        $CompagnieAerienne7 = new CompagnieAerienne();
        $CompagnieAerienne7->setNom("Airlinair");

        $CompagnieAerienne8 = new CompagnieAerienne();
        $CompagnieAerienne8->setNom("Air Méditerranée");

        $CompagnieAerienne9 = new CompagnieAerienne();
        $CompagnieAerienne9->setNom("Atlantique Air Lines");

        $CompagnieAerienne10 = new CompagnieAerienne();
        $CompagnieAerienne10->setNom("Air Guyane");


        $manager->persist($CompagnieAerienne1);
        $manager->persist($CompagnieAerienne2);
        $manager->persist($CompagnieAerienne3);
        $manager->persist($CompagnieAerienne4);
        $manager->persist($CompagnieAerienne5);
        $manager->persist($CompagnieAerienne6);
        $manager->persist($CompagnieAerienne7);
        $manager->persist($CompagnieAerienne8);
        $manager->persist($CompagnieAerienne9);
        $manager->persist($CompagnieAerienne10);
        $manager->flush();
        
        /**
         * Ajout de référence * 10
         */
        $CompagnieAerienne1->addReference('compagnie-aerienne-one', $CompagnieAerienne1);
        $CompagnieAerienne2->addReference('compagnie-aerienne-two', $CompagnieAerienne2);
        $CompagnieAerienne3->addReference('compagnie-aerienne-three', $CompagnieAerienne3);
        $CompagnieAerienne4->addReference('compagnie-aerienne-four', $CompagnieAerienne4);
        $CompagnieAerienne5->addReference('compagnie-aerienne-five', $CompagnieAerienne5);
        $CompagnieAerienne6->addReference('compagnie-aerienne-six', $CompagnieAerienne6);
        $CompagnieAerienne7->addReference('compagnie-aerienne-seven', $CompagnieAerienne7);
        $CompagnieAerienne8->addReference('compagnie-aerienne-eight', $CompagnieAerienne8);
        $CompagnieAerienne9->addReference('compagnie-aerienne-nine', $CompagnieAerienne9);
        $CompagnieAerienne10->addReference('compagnie-aerienne-ten', $CompagnieAerienne10);
    }
    /**
     * Ordre de chargement fixé à 3
     * @return int
     */
    public function getOrder() {
        return 3;
    }

}
