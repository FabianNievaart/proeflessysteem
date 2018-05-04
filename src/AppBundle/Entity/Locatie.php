<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Locatie
 *
 * @ORM\Table(name="locatie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LocatieRepository")
 */
class Locatie
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
     * @ORM\Column(name="naam", type="string", length=255)
     */
    private $naam;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="string", length=255)
     */
    private $info;

    /**
     * @var string
     *
     * @ORM\Column(name="plaatsnaam", type="string", length=255)
     */
    private $plaatsnaam;

    /**
     * @var string
     *
     * @ORM\Column(name="straatnaam", type="string", length=255)
     */
    private $straatnaam;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=255, nullable=true)
     */
    private $foto;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=6)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(name="huisnummer", type="string", length=10)
     */
    private $huisnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="adrestoevoeging", type="string", length=5, nullable=true)
     */
    private $adrestoevoeging;

	/**
	 * @ORM\OneToMany(targetEntity="Proeflessen", mappedBy="locatie_id")
	 */
	private $proeflessen;

	public function __construct()
	{
		$this->proeflessen = new ArrayCollection();
	}

	public function __toString() {
		return (string)$this->getId();
	}


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
     * @return Locatie
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
     * Set info
     *
     * @param string $info
     *
     * @return Locatie
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set plaatsnaam
     *
     * @param string $plaatsnaam
     *
     * @return Locatie
     */
    public function setPlaatsnaam($plaatsnaam)
    {
        $this->plaatsnaam = $plaatsnaam;

        return $this;
    }

    /**
     * Get plaatsnaam
     *
     * @return string
     */
    public function getPlaatsnaam()
    {
        return $this->plaatsnaam;
    }

    /**
     * Set straatnaam
     *
     * @param string $straatnaam
     *
     * @return Locatie
     */
    public function setStraatnaam($straatnaam)
    {
        $this->straatnaam = $straatnaam;

        return $this;
    }

    /**
     * Get straatnaam
     *
     * @return string
     */
    public function getStraatnaam()
    {
        return $this->straatnaam;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Locatie
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     *
     * @return Locatie
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set huisnummer
     *
     * @param string $huisnummer
     *
     * @return Locatie
     */
    public function setHuisnummer($huisnummer)
    {
        $this->huisnummer = $huisnummer;

        return $this;
    }

    /**
     * Get huisnummer
     *
     * @return string
     */
    public function getHuisnummer()
    {
        return $this->huisnummer;
    }

    /**
     * Set adrestoevoeging
     *
     * @param string $adrestoevoeging
     *
     * @return Locatie
     */
    public function setAdrestoevoeging($adrestoevoeging)
    {
        $this->adrestoevoeging = $adrestoevoeging;

        return $this;
    }

    /**
     * Get adrestoevoeging
     *
     * @return string
     */
    public function getAdrestoevoeging()
    {
        return $this->adrestoevoeging;
    }

    /**
     * Add proeflessen
     *
     * @param \AppBundle\Entity\Proeflessen $proeflessen
     *
     * @return Locatie
     */
    public function addProeflessen(\AppBundle\Entity\Proeflessen $proeflessen)
    {
        $this->proeflessen[] = $proeflessen;

        return $this;
    }

    /**
     * Remove proeflessen
     *
     * @param \AppBundle\Entity\Proeflessen $proeflessen
     */
    public function removeProeflessen(\AppBundle\Entity\Proeflessen $proeflessen)
    {
        $this->proeflessen->removeElement($proeflessen);
    }

    /**
     * Get proeflessen
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProeflessen()
    {
        return $this->proeflessen;
    }
}
