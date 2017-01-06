<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Passager
 *
 * @ORM\Table(name="passager")
 * @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\PassagerRepository")
 */
class Passager
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPassager", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idPassager;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="Adresse")
     * @ORM\JoinColumn(name="idAdd", referencedColumnName="idAdd")
     */
    protected $idAdd;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Passager
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Passager
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
     * Get idPassager
     *
     * @return integer
     */
    public function getIdPassager()
    {
        return $this->idPassager;
    }

    /**
     * Set idAdd
     *
     * @param \RocketfireAgenceMainBundle\Entity\Adresse $idAdd
     *
     * @return Passager
     */
    public function setIdAdd(\RocketfireAgenceMainBundle\Entity\Adresse $idAdd = null)
    {
        $this->idAdd = $idAdd;

        return $this;
    }

    /**
     * Get idAdd
     *
     * @return \RocketfireAgenceMainBundle\Entity\Adresse
     */
    public function getIdAdd()
    {
        return $this->idAdd;
    }
}
