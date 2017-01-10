<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vol
 *
 * @ORM\Table(name="vol")
 * @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\VolRepository")
 */
class Vol
{

    /**
     * @var int
     *
     * @ORM\Column(name="idVol", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idVol;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Aeroport")
     * @ORM\JoinColumn(name="idAeroportDepart", referencedColumnName="idAero")
     */
     private $AeroportDepart;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Aeroport")
     * @ORM\JoinColumn(name="idAeroportArrivee", referencedColumnName="idAero")
     */
     private $AeroportArrivee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepart", type="date")
     */
    private $dateDepartVol;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateArrivee", type="date")
     */
    private $dateArriveeVol;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureDepart", type="time")
     */
    private $heureDepartVol;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureArrivee", type="time")
     */
    private $heureArriveeVol;


    public function __toString() {
        return $this->idVol;
    }

    /**
     * Set dateDepartVol
     *
     * @param \DateTime $dateDepartVol
     *
     * @return Vol
     */
    public function setDateDepartVol($dateDepartVol)
    {
        $this->dateDepartVol = $dateDepartVol;

        return $this;
    }

    /**
     * Get dateDepartVol
     *
     * @return \DateTime
     */
    public function getDateDepartVol()
    {
        return $this->dateDepartVol;
    }

    /**
     * Set dateArriveeVol
     *
     * @param \DateTime $dateArriveeVol
     *
     * @return Vol
     */
    public function setDateArriveeVol($dateArriveeVol)
    {
        $this->dateArriveeVol = $dateArriveeVol;

        return $this;
    }

    /**
     * Get dateArriveeVol
     *
     * @return \DateTime
     */
    public function getDateArriveeVol()
    {
        return $this->dateArriveeVol;
    }

    /**
     * Set heureDepartVol
     *
     * @param \DateTime $heureDepartVol
     *
     * @return Vol
     */
    public function setHeureDepartVol($heureDepartVol)
    {
        $this->heureDepartVol = $heureDepartVol;

        return $this;
    }

    /**
     * Get heureDepartVol
     *
     * @return \DateTime
     */
    public function getHeureDepartVol()
    {
        return $this->heureDepartVol;
    }

    /**
     * Set heureArriveeVol
     *
     * @param \DateTime $heureArriveeVol
     *
     * @return Vol
     */
    public function setHeureArriveeVol($heureArriveeVol)
    {
        $this->heureArriveeVol = $heureArriveeVol;

        return $this;
    }

    /**
     * Get heureArriveeVol
     *
     * @return \DateTime
     */
    public function getHeureArriveeVol()
    {
        return $this->heureArriveeVol;
    }

    /**
     * Set AeroportDepart
     *
     * @param \RocketfireAgenceMainBundle\Entity\Aeroport $AeroportDepart
     *
     * @return Vol
     */
    public function setAeroportDepart(\RocketfireAgenceMainBundle\Entity\Aeroport $AeroportDepart = null)
    {
        $this->AeroportDepart = $AeroportDepart;

        return $this;
    }

    /**
     * Get AeroportDepart
     *
     * @return \RocketfireAgenceMainBundle\Entity\Aeroport
     */
    public function getAeroportDepart()
    {
        return $this->AeroportDepart;
    }

    /**
     * Set AeroportArrivee
     *
     * @param \RocketfireAgenceMainBundle\Entity\Aeroport $AeroportArrivee
     *
     * @return Vol
     */
    public function setAeroportArrivee(\RocketfireAgenceMainBundle\Entity\Aeroport $AeroportArrivee = null)
    {
        $this->AeroportArrivee = $AeroportArrivee;

        return $this;
    }

    /**
     * Get AeroportArrivee
     *
     * @return \RocketfireAgenceMainBundle\Entity\Aeroport
     */
    public function getAeroportArrivee()
    {
        return $this->AeroportArrivee;
    }

    /**
     * Get idVol
     *
     * @return integer
     */
    public function getIdVol()
    {
        return $this->idVol;
    }
}
