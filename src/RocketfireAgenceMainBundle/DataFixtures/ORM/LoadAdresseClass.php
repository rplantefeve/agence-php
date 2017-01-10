<?php

namespace RocketfireAgenceMainBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use RocketfireAgenceMainBundle\Entity\Adresse;

/**
 * Description of LoadAdresseClass.
 *
 * @author Seme
 */
class LoadAdresseClass extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $adresseOne = new Adresse();
        $adresseOne->setAdresse('12 rue Tabaga');
        $adresseOne->setCodePostal('59000');
        $adresseOne->setVille('Lille');
        $adresseOne->setPays('ChtiLand');

        $adresseTwo = new Adresse();
        $adresseTwo->setAdresse('44 impasse Et-Manque');
        $adresseTwo->setCodePostal('59650');
        $adresseTwo->setVille('Villeneuve d\'Ascq');
        $adresseTwo->setPays('ChtiLand');

        $adresseThree = new Adresse();
        $adresseThree->setAdresse('1024 rue du bit');
        $adresseThree->setCodePostal('75008');
        $adresseThree->setVille('Rapis');
        $adresseThree->setPays('Frankreich');

        $manager->persist($adresseOne);
        $manager->persist($adresseTwo);
        $manager->persist($adresseThree);
        $manager->flush();

        $this->addReference('adresse-one', $adresseOne);
        $this->addReference('adresse-two', $adresseTwo);
        $this->addReference('adresse-three', $adresseThree);
    }

    public function getOrder()
    {
        return 2;
    }
}
