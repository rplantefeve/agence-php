<?php

namespace RocketfireAgenceMainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use RocketfireAgenceMainBundle\Entity\Ville;

/**
  * Description of LoadVilleClass.
  *
  * @author Seme
  */
 class LoadVilleClass extends AbstractFixture implements OrderedFixtureInterface
 {
     public function load(ObjectManager $manager)
     {
         $villeOne = new Ville();
         $villeOne->setNom('Lille');

         $villeTwo = new Ville();
         $villeTwo->setNom('Paris');

         $villeThree = new Ville();
         $villeThree->setNom('Lyon');

         $manager->persist($villeOne);
         $manager->persist($villeTwo);
         $manager->persist($villeThree);
         $manager->flush();

         $this->addReference('ville-one', $villeOne);
         $this->addReference('ville-two', $villeTwo);
         $this->addReference('ville-three', $villeThree);
     }

     public function getOrder()
     {
         // the order in which fixtures will be loaded
         // the lower the number, the sooner that this fixture is loaded
         return 4;
     }
 }
