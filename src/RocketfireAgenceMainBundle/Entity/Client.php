<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Client
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\clientRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 */
abstract class Client
{
    /**
     * @var int
     *
     * @ORM\Column(name="idClient", type="bigint", length=15)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idClient;

    /**
     * @Assert\NotBlank()
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30)
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=true)
     */
    protected $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="numTel", type="string", length=14, unique=true)
     */
    protected $numTel;

    /**
     * @var int
     *
     * @ORM\Column(name="numFax", type="bigint", unique=true, nullable=true)
     */
    protected $numFax;

    /**
     * @var int
     *
     * @ORM\Column(name="siret", type="bigint", unique=true, nullable=true)
     */
    protected $siret;

    /**
     * @var string
     *
     * @ORM\Column(name="eMail", type="string", length=40, unique=true)
     */
    protected $eMail;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="Adresse")
     * @ORM\JoinColumn(name="idAdd", referencedColumnName="idAdd")
     */
    protected $idAdd;

    /**
     * @var Login
     *
     * @ORM\OneToOne(targetEntity="RocketfireAgenceMainBundle\Entity\Login", inversedBy="client")
     * @ORM\JoinColumn(name="idLog", referencedColumnName="id")
     */
    protected $login;


     public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return client
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */

    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set numTel
     *
     * @param string $numTel
     *
     * @return client
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;

        return $this;
    }

    /**
     * Get numTel
     *
     * @return string
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * Set eMail
     *
     * @param string $eMail
     *
     * @return client
     */
    public function setEMail($eMail)
    {
        $this->eMail = $eMail;

        return $this;
    }

    /**
     * Get eMail
     *
     * @return string
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * Set idAdd
     *
     * @param integer $idAdd
     *
     * @return client
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Client
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set numFax
     *
     * @param integer $numFax
     *
     * @return Client
     */
    public function setNumFax($numFax)
    {
        $this->numFax = $numFax;

        return $this;
    }

    /**
     * Get numFax
     *
     * @return integer
     */
    public function getNumFax()
    {
        return $this->numFax;
    }

    /**
     * Set siret
     *
     * @param integer $siret
     *
     * @return Client
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret
     *
     * @return integer
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set login
     *
     * @param \RocketfireAgenceMainBundle\Entity\Login $login
     *
     * @return Client
     */
    public function setLogin(\RocketfireAgenceMainBundle\Entity\Login $login = null)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return \RocketfireAgenceMainBundle\Entity\Login
     */
    public function getLogin()
    {
        return $this->login;
    }
}
