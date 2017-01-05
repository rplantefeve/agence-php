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
     * @var int
     *
     * @ORM\Column(name="idCompagnie", type="bigint", unique=true)
     */
    private $idCompagnie;

    /**
     * @var int
     *
     * @ORM\Column(name="idVol", type="bigint", unique=true)
     */
    private $idVol;


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
     * @param integer $idCompagnie
     *
     * @return CompagnieAerienneVol
     */
    public function setIdCompagnie($idCompagnie)
    {
        $this->idCompagnie = $idCompagnie;

        return $this;
    }

    /**
     * Get idCompagnie
     *
     * @return int
     */
    public function getIdCompagnie()
    {
        return $this->idCompagnie;
    }

    /**
     * Set idVol
     *
     * @param integer $idVol
     *
     * @return CompagnieAerienneVol
     */
    public function setIdVol($idVol)
    {
        $this->idVol = $idVol;

        return $this;
    }

    /**
     * Get idVol
     *
     * @return int
     */
    public function getIdVol()
    {
        return $this->idVol;
    }
}

