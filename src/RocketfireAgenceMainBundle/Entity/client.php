<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\clientRepository")
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
     * @ORM\Column(name="numTel", type="string", length=14, unique=true)
     */
    protected $numTel;

    /**
     * @var string
     *
     * @ORM\Column(name="eMail", type="string", length=40, unique=true)
     */
    protected $eMail;

    /**
     * @var int
     *
     * @ORM\Column(name="idAdd", type="integer", nullable=true)
     */
    protected $idAdd;

    /**
     * @var int
     *
     * @ORM\Column(name="idLog", type="bigint", unique=true)
     */
    protected $idLog;

    /**
     * Get idClient
     *
     * @return int
     */
    abstract public function getIdClient();

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return client
     */
    abstract public function setNom($nom);

    /**
     * Get nom
     *
     * @return string
     */
    abstract public function getNom();

    /**
     * Set numTel
     *
     * @param string $numTel
     *
     * @return client
     */
    abstract public function setNumTel($numTel);

    /**
     * Get numTel
     *
     * @return string
     */
    abstract public function getNumTel();

    /**
     * Set eMail
     *
     * @param string $eMail
     *
     * @return client
     */
    abstract public function setEMail($eMail);

    /**
     * Get eMail
     *
     * @return string
     */
    abstract public function getEMail();

    /**
     * Set idAdd
     *
     * @param integer $idAdd
     *
     * @return client
     */
    abstract public function setIdAdd($idAdd);

    /**
     * Get idAdd
     *
     * @return int
     */
    abstract public function getIdAdd();

    /**
     * Set idLog
     *
     * @param integer $idLog
     *
     * @return client
     */
    abstract public function setIdLog($idLog);

    /**
     * Get idLog
     *
     * @return int
     */
    abstract public function getIdLog();
}

