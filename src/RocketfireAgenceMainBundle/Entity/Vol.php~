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
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Aeroport")
     * @ORM\JoinColumn(name="idAeroportDepart", referencedColumnName="id")
     */
     private $idAeroportDepart;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Aeroport")
     * @ORM\JoinColumn(name="idAeroportArrivee", referencedColumnName="id")
     */
     private $idAeroportArrivee;

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


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }




    public function __toString() {
        return $this->id;
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
     * Set idAeroportDepart
     *
     * @param \RocketfireAgenceMainBundle\Entity\Aeroport $idAeroportDepart
     *
     * @return Vol
     */
    public function setIdAeroportDepart(\RocketfireAgenceMainBundle\Entity\Aeroport $idAeroportDepart = null)
    {
        $this->idAeroportDepart = $idAeroportDepart;

        return $this;
    }

    /**
     * Get idAeroportDepart
     *
     * @return \RocketfireAgenceMainBundle\Entity\Aeroport
     */
    public function getIdAeroportDepart()
    {
        return $this->idAeroportDepart;
    }

    /**
     * Set idAeroportArrivee
     *
     * @param \RocketfireAgenceMainBundle\Entity\Aeroport $idAeroportArrivee
     *
     * @return Vol
     */
    public function setIdAeroportArrivee(\RocketfireAgenceMainBundle\Entity\Aeroport $idAeroportArrivee = null)
    {
        $this->idAeroportArrivee = $idAeroportArrivee;

        return $this;
    }

    /**
     * Get idAeroportArrivee
     *
     * @return \RocketfireAgenceMainBundle\Entity\Aeroport
     */
    public function getIdAeroportArrivee()
    {
        return $this->idAeroportArrivee;
    }
}
