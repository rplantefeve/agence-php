<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresse
 *
 * @ORM\Table(name="adresse")
 * @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\AdresseRepository")
 */
class Adresse
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAdd", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idAdd;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="codePostal", type="string", length=5, nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=163)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=31)
     */
    private $pays;
    
    /**
     * @var Client 
     * 
     * @ORM\OneToOne(targetEntity="RocketfireAgenceMainBundle\Entity\Client", mappedBy="adresse")
     */
    private $client;


    /**
     * Set idAdd
     *
     * @param integer $idAdd
     *
     * @return Adresse
     */
    public function setIdAdd($idAdd)
    {
        $this->idAdd = $idAdd;

        return $this;
    }

    /**
     * Get idAdd
     *
     * @return int
     */
    public function getIdAdd()
    {
        return $this->idAdd;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Adresse
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Adresse
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Adresse
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }


    /**
     * Set client
     *
     * @param \RocketfireAgenceMainBundle\Entity\Client $client
     *
     * @return Adresse
     */
    public function setClient(\RocketfireAgenceMainBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \RocketfireAgenceMainBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    
    /**
     * 
     * @return string
     */
    public function __toString() {
		return $this->adresse;
    }
     
}
