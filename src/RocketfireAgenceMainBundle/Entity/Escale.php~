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
    private $dateDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateArrivee", type="date")
     */
    private $dateArrivee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureDepart", type="time")
     */
    private $heureDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureArrivee", type="time")
     */
    private $heureArrivee;


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
     * Set dateDepart
     *
     * @param \DateTime $dateDepart
     *
     * @return Escale
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \DateTime
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set dateArrivee
     *
     * @param \DateTime $dateArrivee
     *
     * @return Escale
     */
    public function setDateArrivee($dateArrivee)
    {
        $this->dateArrivee = $dateArrivee;

        return $this;
    }

    /**
     * Get dateArrivee
     *
     * @return \DateTime
     */
    public function getDateArrivee()
    {
        return $this->dateArrivee;
    }

    /**
     * Set heureDepart
     *
     * @param string $heureDepart
     *
     * @return Escale
     */
    public function setHeureDepart($heureDepart)
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    /**
     * Get heureDepart
     *
     * @return string
     */
    public function getHeureDepart()
    {
        return $this->heureDepart;
    }

    /**
     * Set heureArrivee
     *
     * @param \DateTime $heureArrivee
     *
     * @return Escale
     */
    public function setHeureArrivee($heureArrivee)
    {
        $this->heureArrivee = $heureArrivee;

        return $this;
    }

    /**
     * Get heureArrivee
     *
     * @return \DateTime
     */
    public function getHeureArrivee()
    {
        return $this->heureArrivee;
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
