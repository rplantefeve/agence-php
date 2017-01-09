<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Login
 *
 * @ORM\Table(name="login")
 * @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\LoginRepository")
 * @UniqueEntity(fields="login", message="Compte déjà existant")
 */
class Login implements UserInterface, \Serializable {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=50, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="motDePasse", type="string", length=64)
     */
    private $motDePasse;

    /**
     * @var bool
     *
     * @ORM\Column(name="admin", type="boolean")
     */
    private $admin;

    /**
     * @var bool
     * 
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @var Client 
     * 
     * @ORM\OneToOne(targetEntity="RocketfireAgenceMainBundle\Entity\Client", mappedBy="login")
     */
    private $client;

    public function __construct() {
        $this->isActive = true;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Login
     */
    public function setLogin($login) {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin() {
        return $this->login;
    }

    /**
     * Set motDePasse
     *
     * @param string $motDePasse
     *
     * @return Login
     */
    public function setMotDePasse($motDePasse) {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    /**
     * Get motDePasse
     *
     * @return string
     */
    public function getMotDePasse() {
        return $this->motDePasse;
    }

    /**
     * Set admin
     *
     * @param boolean $admin
     *
     * @return Login
     */
    public function setAdmin($admin) {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return boolean
     */
    public function isAdmin() {
        return $this->admin;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Login
     */
    public function setActive($isActive) {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function isActive() {
        return $this->isActive;
    }

    /**
     * Set client
     *
     * @param \RocketfireAgenceMainBundle\Entity\Client $client
     *
     * @return Login
     */
    public function setClient(\RocketfireAgenceMainBundle\Entity\Client $client =
    null) {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \RocketfireAgenceMainBundle\Entity\Client
     */
    public function getClient() {
        return $this->client;
    }

    /**
     * Teste si l'utilisateur loggué est le même que le Login
     * 
     * @param \RocketfireAgenceMainBundle\Entity\Login $user
     * @return boolean
     */
    public function isSelf(Login $user = null) {
        return $user && $user->getLogin() == $this->login;
    }

    public function getUsername() {
        return $this->login;
    }

    public function getSalt() {
        // on retourne null car en utilisant bcrypt, le salt est généré en interne
        return null;
    }

    public function getPassword() {
        return $this->motDePasse;
    }

    public function getRoles() {
        if ($this->isAdmin()) {
            return [
                'ROLE_ADMIN'];
        } else {
            return array(
                'ROLE_USER');
        }
    }

    public function eraseCredentials() {
        
    }

    /** @see \Serializable::serialize() */
    public function serialize() {
        return serialize(array(
            $this->id,
            $this->login,
            $this->motDePasse,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized) {
        list (
                $this->id,
                $this->login,
                $this->motDePasse,
                ) = unserialize($serialized);
    }

}
