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
     * @return Vol
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
     * @return Vol
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
     * @param \DateTime $heureDepart
     *
     * @return Vol
     */
    public function setHeureDepart($heureDepart)
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    /**
     * Get heureDepart
     *
     * @return \DateTime
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
     * @return Vol
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
     * Constructor
     */
    public function __construct()
    {
        $this->idAeroportDepart = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idAeroportArrivee = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add idAeroportDepart
     *
     * @param \RocketfireAgenceMainBundle\Entity\Aeroport $idAeroportDepart
     *
     * @return Vol
     */
    public function addIdAeroportDepart(\RocketfireAgenceMainBundle\Entity\Aeroport $idAeroportDepart)
    {
        $this->idAeroportDepart[] = $idAeroportDepart;

        return $this;
    }

    /**
     * Remove idAeroportDepart
     *
     * @param \RocketfireAgenceMainBundle\Entity\Aeroport $idAeroportDepart
     */
    public function removeIdAeroportDepart(\RocketfireAgenceMainBundle\Entity\Aeroport $idAeroportDepart)
    {
        $this->idAeroportDepart->removeElement($idAeroportDepart);
    }

    /**
     * Get idAeroportDepart
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdAeroportDepart()
    {
        return $this->idAeroportDepart;
    }

    /**
     * Add idAeroportArrivee
     *
     * @param \RocketfireAgenceMainBundle\Entity\Aeroport $idAeroportArrivee
     *
     * @return Vol
     */
    public function addIdAeroportArrivee(\RocketfireAgenceMainBundle\Entity\Aeroport $idAeroportArrivee)
    {
        $this->idAeroportArrivee[] = $idAeroportArrivee;

        return $this;
    }

    /**
     * Remove idAeroportArrivee
     *
     * @param \RocketfireAgenceMainBundle\Entity\Aeroport $idAeroportArrivee
     */
    public function removeIdAeroportArrivee(\RocketfireAgenceMainBundle\Entity\Aeroport $idAeroportArrivee)
    {
        $this->idAeroportArrivee->removeElement($idAeroportArrivee);
    }

    /**
     * Get idAeroportArrivee
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdAeroportArrivee()
    {
        return $this->idAeroportArrivee;
    }

    /**
     * Set idAeroportDepart
     *
     * @param integer $idAeroportDepart
     *
     * @return Vol
     */
    public function setIdAeroportDepart($idAeroportDepart)
    {
        $this->idAeroportDepart = $idAeroportDepart;

        return $this;
    }

    /**
     * Set idAeroportArrivee
     *
     * @param integer $idAeroportArrivee
     *
     * @return Vol
     */
    public function setIdAeroportArrivee($idAeroportArrivee)
    {
        $this->idAeroportArrivee = $idAeroportArrivee;

        return $this;
    }

    /**
     * Set aeroportDepart
     *
     * @param \RocketfireAgenceMainBundle\Entity\Aeroport $aeroportDepart
     *
     * @return Vol
     */
    public function setAeroportDepart(\RocketfireAgenceMainBundle\Entity\Aeroport $aeroportDepart = null)
    {
        $this->aeroportDepart = $aeroportDepart;

        return $this;
    }

    /**
     * Get aeroportDepart
     *
     * @return \RocketfireAgenceMainBundle\Entity\Aeroport
     */
    public function getAeroportDepart()
    {
        return $this->aeroportDepart;
    }

    /**
     * Set aeroportArrivee
     *
     * @param \RocketfireAgenceMainBundle\Entity\Aeroport $aeroportArrivee
     *
     * @return Vol
     */
    public function setAeroportArrivee(\RocketfireAgenceMainBundle\Entity\Aeroport $aeroportArrivee = null)
    {
        $this->aeroportArrivee = $aeroportArrivee;

        return $this;
    }

    /**
     * Get aeroportArrivee
     *
     * @return \RocketfireAgenceMainBundle\Entity\Aeroport
     */
    public function getAeroportArrivee()
    {
        return $this->aeroportArrivee;
    }

    public function __toString() {
        return $this->id;
    }
}
