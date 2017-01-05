<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Aeroport
*
* @ORM\Table(name="aeroport")
* @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\AeroportRepository")
*/
class Aeroport
{


    /**
    * @var Ville $villes
    *
    * @ORM\ManyToMany(targetEntity="Ville", cascade={"persist", "merge"})
    * @ORM\JoinTable(name="ville_aeroport",
    *      joinColumns={
    *       @ORM\JoinColumn( name="idAeroport", referencedColumnName="id")
    *       },
    *       inverseJoinColumns={
    *       @ORM\JoinColumn( name="idVille", referencedColumnName="id")
    *       }
    * )
    */
    private $villes;


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
    * @ORM\Column(name="nom", type="string", length=255)
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
    * @return Aeroport
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
    * Constructor
    */
    public function __construct()
    {
        $this->villes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
    * Get idAeroport
    *
    * @return integer
    */
    public function getIdAeroport()
    {
        return $this->idAeroport;
    }

    /**
    * Add ville
    *
    * @param \RocketfireAgenceMainBundle\Entity\Ville $ville
    *
    * @return Aeroport
    */
    public function addVille(\RocketfireAgenceMainBundle\Entity\Ville $ville)
    {
        $this->villes[] = $ville;

        return $this;
    }

    /**
    * Remove ville
    *
    * @param \RocketfireAgenceMainBundle\Entity\Ville $ville
    */
    public function removeVille(\RocketfireAgenceMainBundle\Entity\Ville $ville)
    {
        $this->villes->removeElement($ville);
    }

    /**
    * Get villes
    *
    * @return \Doctrine\Common\Collections\Collection
    */
    public function getVilles()
    {
        return $this->villes;
    }

    public function __toString() {
        return $this->nom;
    }
}
