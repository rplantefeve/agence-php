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
    * @var int
    *
    * @ORM\Column(name="idAero", type="bigint")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $idAero;

    /**
    * @var string
    *
    * @ORM\Column(name="nom", type="string", length=60)
    */
    private $nom;

    /**
     * Get idAero
     *
     * @return integer
     */
    public function getIdAero()
    {
        return $this->idAero;
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

    public function _toString(){
        return $this->nom;
    }
}
