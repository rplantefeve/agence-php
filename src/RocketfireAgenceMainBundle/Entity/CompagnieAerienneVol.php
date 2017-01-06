<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompagnieAerienneVol
 *
 * @ORM\Table(name="compagnie_aerienne_vol")
 * @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\CompagnieAerienneVolRepository")
 */
class CompagnieAerienneVol
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="CompagnieAerienne")
     * @ORM\JoinColumn(name="idCompagnie", referencedColumnName="id")
     */
     private $idCompagnie;

    /**
     *
     * @var int
     * @ORM\ManyToOne(targetEntity="Vol")
     * @ORM\JoinColumn(name="idVol", referencedColumnName="id")
     */
     private $idVol;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=15, unique=true)
     */
    private $numero;

    /**
     * @var bool
     *
     * @ORM\Column(name="ouvert", type="boolean", nullable=true)
     */
    private $ouvert;


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
     * Set numero
     *
     * @param string $numero
     *
     * @return CompagnieAerienneVol
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set ouvert
     *
     * @param boolean $ouvert
     *
     * @return CompagnieAerienneVol
     */
    public function setOuvert($ouvert)
    {
        $this->ouvert = $ouvert;

        return $this;
    }

    /**
     * Get ouvert
     *
     * @return bool
     */
    public function getOuvert()
    {
        return $this->ouvert;
    }

    /**
     * Set idCompagnie
     *
     * @param \RocketfireAgenceMainBundle\Entity\CompagnieAerienne $idCompagnie
     *
     * @return CompagnieAerienneVol
     */
    public function setIdCompagnie(\RocketfireAgenceMainBundle\Entity\CompagnieAerienne $idCompagnie = null)
    {
        $this->idCompagnie = $idCompagnie;

        return $this;
    }

    /**
     * Get idCompagnie
     *
     * @return \RocketfireAgenceMainBundle\Entity\CompagnieAerienne
     */
    public function getIdCompagnie()
    {
        return $this->idCompagnie;
    }

    /**
     * Set idVol
     *
     * @param \RocketfireAgenceMainBundle\Entity\Vol $idVol
     *
     * @return CompagnieAerienneVol
     */
    public function setIdVol(\RocketfireAgenceMainBundle\Entity\Vol $idVol = null)
    {
        $this->idVol = $idVol;

        return $this;
    }

    /**
     * Get idVol
     *
     * @return \RocketfireAgenceMainBundle\Entity\Vol
     */
    public function getIdVol()
    {
        return $this->idVol;
    }
}
