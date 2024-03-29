<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientAssociation.
 *
 * @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\ClientRepository")
 */
abstract class Professionnel extends Client
{
    /**
     * @var int
     */
    protected $numFax;

     /**
      * @var int
      */
     protected $siret;

    /**
     * Get idClient.
     *
     * @return int
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set nom.
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
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set numTel.
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
     * Get numTel.
     *
     * @return string
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * Set numFax.
     *
     * @param int $numFax
     *
     * @return client
     */
    public function setNumFax($numFax)
    {
        $this->numFax = $numFax;

        return $this;
    }

    /**
     * Get numFax.
     *
     * @return int
     */
    public function getNumFax()
    {
        return $this->numFax;
    }

    /**
     * Set eMail.
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
     * Get eMail.
     *
     * @return string
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * Set siret.
     *
     * @param int $siret
     *
     * @return client
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret.
     *
     * @return int
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set idAdd.
     *
     * @param int $idAdd
     *
     * @return client
     */
    public function setIdAdd($idAdd)
    {
        $this->adresse = $idAdd;

        return $this;
    }

    /**
     * Get idAdd.
     *
     * @return int
     */
    public function getIdAdd()
    {
        return $this->adresse;
    }

    /**
     * Set idLog.
     *
     * @param int $idLog
     *
     * @return client
     */
    public function setIdLog($idLog)
    {
        $this->idLog = $idLog;

        return $this;
    }

    /**
     * Get idLog.
     *
     * @return int
     */
    public function getIdLog()
    {
        return $this->idLog;
    }
}
