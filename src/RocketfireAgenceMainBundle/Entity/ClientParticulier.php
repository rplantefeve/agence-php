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
    
    public function __toString(){
        return $this->prenom;
    }
}
