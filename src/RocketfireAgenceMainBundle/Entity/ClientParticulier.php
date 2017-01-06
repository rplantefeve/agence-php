<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use RocketfireAgenceMainBundle\Entity\Client;

/**
 * ClientParticulier
 *
 * @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\clientRepository")
 */
class ClientParticulier extends Client
{
    /**
     * @var string
     */
    protected $prenom;

    /**
     * Get idClient
     *
     * @return int
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return client
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
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
     * Set idLog
     *
     * @param integer $idLog
     *
     * @return client
     */
    public function setIdLog($idLog)
    {
        $this->idLog = $idLog;

        return $this;
    }

    /**
     * Get idLog
     *
     * @return int
     */
    public function getIdLog()
    {
        return $this->idLog;
    }
}

