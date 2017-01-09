<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientParticulier.
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
     * Set prenom.
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
     * Get prenom.
     *
     * @return string
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
}
