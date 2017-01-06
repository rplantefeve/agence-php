<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Ville
*
* @ORM\Table(name="ville")
* @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\VilleRepository")
*/
class Ville
{

    /**
    * @var int
    *
    * @ORM\Column(name="id", type="bigint")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;

    /**
    * @var string
    *
    * @ORM\Column(name="nom", type="string", length=255, unique=true)
    */
    private $nom;


    /**
    * Get id
    *
    * @return int
    */
    public function getId()
    {
        return $this->id;
    }

    /**
    * Set nom
    *
    * @param string $nom
    *
    * @return Ville
    */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
    * Get nom
    *
    * @return string
    */
    public function getNom()
    {
        return $this->nom;
    }

    /**
    * Get the value of Aeroports
    *
    * @return ArrayCollection $aeroports
    */
    public function getAeroports()
    {
        return $this->aeroports;
    }


    /**
    * Constructor
    */
    public function __construct()
    {
        $this->aeroports = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
    * Get idVille
    *
    * @return integer
    */
    public function getIdVille()
    {
        return $this->idVille;
    }

    public function __toString() {
        return $this->nom;
    }
}