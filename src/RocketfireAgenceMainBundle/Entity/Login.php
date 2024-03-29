<?php

namespace RocketfireAgenceMainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Login.
 *
 * @ORM\Table(name="login")
 * @ORM\Entity(repositoryClass="RocketfireAgenceMainBundle\Repository\LoginRepository")
 * @UniqueEntity(fields="login", message="Compte déjà existant")
 */
class Login implements UserInterface, \Serializable
{
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
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="motDePasse", type="string", length=64)
     */
    private $motDePasse;

    /**
     * @var string
     */
    private $motDePasseConf;

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
    private $active;

    /**
     * @var Client
     *
     * @ORM\OneToOne(targetEntity="RocketfireAgenceMainBundle\Entity\Client", mappedBy="login")
     */
    private $client;

    public function __construct()
    {
        $this->active = true;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set login.
     *
     * @param string $login
     *
     * @return Login
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login.
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set motDePasse.
     *
     * @param string $motDePasse
     *
     * @return Login
     */
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    /**
     * Get motDePasse.
     *
     * @return string
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * Set motDePasseConf.
     *
     * @param string $motDePasseConf
     *
     * @return Login
     */
    public function setMotDePasseConf($motDePasseConf)
    {
        $this->motDePasseConf = $motDePasseConf;

        return $this;
    }

    /**
     * Get motDePasseConf.
     *
     * @return string
     */
    public function getMotDePasseConf()
    {
        return $this->motDePasseConf;
    }

    /**
     * Set admin.
     *
     * @param bool $admin
     *
     * @return Login
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * Set active.
     *
     * @param bool $active
     *
     * @return Login
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active.
     *
     * @return bool
     */
    public function active()
    {
        return $this->active;
    }

    /**
     * Set client.
     *
     * @param \RocketfireAgenceMainBundle\Entity\Client $client
     *
     * @return Login
     */
    public function setClient(\RocketfireAgenceMainBundle\Entity\Client $client =
    null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client.
     *
     * @return \RocketfireAgenceMainBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Teste si l'utilisateur loggué est le même que le Login.
     *
     * @param \RocketfireAgenceMainBundle\Entity\Login $user
     *
     * @return bool
     */
    public function isSelf(Login $user = null)
    {
        return $user && $user->getLogin() == $this->login;
    }

    public function getUsername()
    {
        return $this->login;
    }

    public function getSalt()
    {
        // on retourne null car en utilisant bcrypt, le salt est généré en interne
        return null;
    }

    public function getPassword()
    {
        return $this->motDePasse;
    }

    public function getRoles()
    {
        if ($this->isAdmin()) {
            return [
                'ROLE_ADMIN', ];
        } else {
            return [
                'ROLE_USER', ];
        }
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->login,
            $this->motDePasse,
        ]);
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list(
                $this->id,
                $this->login,
                $this->motDePasse) = unserialize($serialized);
    }

    /**
     * Get admin.
     *
     * @return bool
     */
    public function getAdmin()
    {
        return $this->admin;
    }

}
