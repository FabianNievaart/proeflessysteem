<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admins
 *
 * @ORM\Table(name="admins")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdminsRepository")
 */
class Admins
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
     * @ORM\Column(name="naam", type="string", length=255, unique=true)
     */
    private $naam;

    /**
     * @var string
     *
     * @ORM\Column(name="wachtwoord", type="string", length=255)
     */
    private $wachtwoord;

    /**
     * @var string
     *
     * @ORM\Column(name="rol", type="string", length=255)
     */
    private $rol;


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
     * Set naam
     *
     * @param string $naam
     *
     * @return Admins
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * Get naam
     *
     * @return string
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * Set wachtwoord
     *
     * @param string $wachtwoord
     *
     * @return Admins
     */
    public function setWachtwoord($wachtwoord)
    {
        $this->wachtwoord = $wachtwoord;

        return $this;
    }

    /**
     * Get wachtwoord
     *
     * @return string
     */
    public function getWachtwoord()
    {
        return $this->wachtwoord;
    }

    /**
     * Set rol
     *
     * @param string $rol
     *
     * @return Admins
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return string
     */
    public function getRol()
    {
        return $this->rol;
    }
}
