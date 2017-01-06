<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use RocketfireAgenceMainBundle\Entity\Professionnel;

/**
 * ClientAssociation
 *
 * @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\clientRepository")
 */
class ClientAssociation extends Professionnel
{

}
