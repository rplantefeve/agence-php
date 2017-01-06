<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Escale
 *
 * @ORM\Table(name="escale")
 * @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\EscaleRepository")
 */
class Escale
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
     * @ORM\ManyToOne(targetEntity="Aeroport")
     * @ORM\JoinColumn(name="idAeroport", referencedColumnName="id")
     */
     private $idAeroport;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Vol")
     * @ORM\JoinColumn(name="idVol", referencedColumnName="id")
     */
     private $idVol;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepart", type="date")
     */
    private $dateDepartEscale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateArrivee", type="date")
     */
    private $dateArriveeEscale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureDepart", type="time")
     */
    private $heureDepartEscale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureArrivee", type="time")
     */
    private $heureArriveeEscale;


    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateDepartEscale
     *
     * @param \DateTime $dateDepartEscale
     *
     * @return Escale
     */
    public function setDateDepartEscale($dateDepartEscale)
    {
        $this->dateDepartEscale = $dateDepartEscale;

        return $this;
    }

    /**
     * Get dateDepartEscale
     *
     * @return \DateTime
     */
    public function getDateDepartEscale()
    {
        return $this->dateDepartEscale;
    }

    /**
     * Set dateArriveeEscale
     *
     * @param \DateTime $dateArriveeEscale
     *
     * @return Escale
     */
    public function setDateArriveeEscale($dateArriveeEscale)
    {
        $this->dateArriveeEscale = $dateArriveeEscale;

        return $this;
    }

    /**
     * Get dateArriveeEscale
     *
     * @return \DateTime
     */
    public function getDateArriveeEscale()
    {
        return $this->dateArriveeEscale;
    }

    /**
     * Set heureDepartEscale
     *
     * @param \DateTime $heureDepartEscale
     *
     * @return Escale
     */
    public function setHeureDepartEscale($heureDepartEscale)
    {
        $this->heureDepartEscale = $heureDepartEscale;

        return $this;
    }

    /**
     * Get heureDepartEscale
     *
     * @return \DateTime
     */
    public function getHeureDepartEscale()
    {
        return $this->heureDepartEscale;
    }

    /**
     * Set heureArriveeEscale
     *
     * @param \DateTime $heureArriveeEscale
     *
     * @return Escale
     */
    public function setHeureArriveeEscale($heureArriveeEscale)
    {
        $this->heureArriveeEscale = $heureArriveeEscale;

        return $this;
    }

    /**
     * Get heureArriveeEscale
     *
     * @return \DateTime
     */
    public function getHeureArriveeEscale()
    {
        return $this->heureArriveeEscale;
    }

    /**
     * Set idAeroport
     *
     * @param \RocketfireAgenceMainBundle\Entity\Aeroport $idAeroport
     *
     * @return Escale
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

    /**
     * Set idVol
     *
     * @param \RocketfireAgenceMainBundle\Entity\Vol $idVol
     *
     * @return Escale
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
