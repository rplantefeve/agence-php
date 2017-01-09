<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VilleAeroport
 *
 * @ORM\Table(name="ville_aeroport")
 * @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\VilleAeroportRepository")
 */
class VilleAeroport
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
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumn(name="idVille", referencedColumnName="id")
     */
    protected $idVille;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Aeroport")
     * @ORM\JoinColumn(name="idAeroport", referencedColumnName="idAero")
     */
    protected $idAeroport;



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
     * Set idVille
     *
     * @param \RocketfireAgenceMainBundle\Entity\Ville $idVille
     *
     * @return VilleAeroport
     */
    public function setIdVille(\RocketfireAgenceMainBundle\Entity\Ville $idVille = null)
    {
        $this->idVille = $idVille;

        return $this;
    }

    /**
     * Get idVille
     *
     * @return \RocketfireAgenceMainBundle\Entity\Ville
     */
    public function getIdVille()
    {
        return $this->idVille;
    }

    /**
     * Set idAeroport
     *
     * @param \RocketfireAgenceMainBundle\Entity\Aeroport $idAeroport
     *
     * @return VilleAeroport
     */
    public function setIdAeroport(\RocketfireAgenceMainBundle\Entity\Aeroport $idAeroport = null)
    {
        $this->idAeroport = $idAeroport;

        return $this;
    }

    /**
     * Get idAeroport
     *
     * @return \RocketfireAgenceMainBundle\Entity\Aeroport
     */
    public function getIdAeroport()
    {
        return $this->idAeroport;
    }
}
