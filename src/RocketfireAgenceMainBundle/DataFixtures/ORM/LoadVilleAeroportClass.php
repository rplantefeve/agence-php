<?php

 namespace RocketfireAgenceMainBundle\DataFixtures\ORM;

 use Doctrine\Common\DataFixtures\AbstractFixture;
 use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
 use Doctrine\Common\Persistence\ObjectManager;
 use RocketfireAgenceMainBundle\Entity\VilleAeroport;

 /**
 * Description of LoadVilleAeroportClass
 *
 */
 class LoadVilleAeroportClass extends AbstractFixture implements OrderedFixtureInterface{

     public function load(ObjectManager $manager) {

         $villeAeroportOne = new VilleAeroport();
         $villeAeroportOne->setIdAeroport($this->getReference("aeroport-one"));
         $villeAeroportOne->setIdVille($this->getReference("ville-one"));
         
         $villeAeroportTwo = new VilleAeroport();
         $villeAeroportTwo->setIdAeroport($this->getReference("aeroport-two"));
         $villeAeroportTwo->setIdVille($this->getReference("ville-two"));
         
         

         $manager->persist($villeAeroportOne);
         $manager->persist($villeAeroportTwo);
         $manager->flush();
     }

     public function getOrder(){
         // the order in which fixtures will be loaded
         // the lower the number, the sooner that this fixture is loaded
         return 6;
     }

 }
