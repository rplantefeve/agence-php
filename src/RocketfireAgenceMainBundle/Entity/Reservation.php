<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idResa", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idResa;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="Vol")
     * @ORM\JoinColumn(name="idVol", referencedColumnName="idVol")
     */
    protected $idVol;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="idClient", referencedColumnName="idClient")
     */
    protected $idAdd;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="Passager")
     * @ORM\JoinColumn(name="idPassager", referencedColumnName="idPassager")
     */
    protected $idPassager;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReservation", type="date")
     */
    private $dateReservation;

    public function __construct(){
        $this->dateReservation = new \DateTime();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column( type="string",columnDefinition="ENUM('ouvert', 'fermé')")
     */
    private $etat;

    /**
     * Set dateReservation
     *
     * @param \DateTime $dateReservation
     *
     * @return Reservation
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * Get dateReservation
     *
     * @return \DateTime
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Reservation
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Reservation
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Get idResa
     *
     * @return integer
     */
    public function getIdResa()
    {
        return $this->idResa;
    }

    /**
     * Set idVol
     *
     * @param \RocketfireAgenceMainBundle\Entity\Vol $idVol
     *
     * @return Reservation
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

    /**
     * Set idAdd
     *
     * @param \RocketfireAgenceMainBundle\Entity\Client $idAdd
     *
     * @return Reservation
     */
    public function setIdAdd(\RocketfireAgenceMainBundle\Entity\Client $idAdd = null)
    {
        $this->idAdd = $idAdd;

        return $this;
    }

    /**
     * Get idAdd
     *
     * @return \RocketfireAgenceMainBundle\Entity\Client
     */
    public function getIdAdd()
    {
        return $this->idAdd;
    }

    /**
     * Set idPassager
     *
     * @param \RocketfireAgenceMainBundle\Entity\Passager $idPassager
     *
     * @return Reservation
     */
    public function setIdPassager(\RocketfireAgenceMainBundle\Entity\Passager $idPassager = null)
    {
        $this->idPassager = $idPassager;

        return $this;
    }

    /**
     * Get idPassager
     *
     * @return \RocketfireAgenceMainBundle\Entity\Passager
     */
    public function getIdPassager()
    {
        return $this->idPassager;
    }
}
