<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Docent
 *
 * @ORM\Table(name="docent")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DocentRepository")
 */
class Docent
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
     * @ORM\Column(name="voornaam", type="string", length=255)
     */
    private $voornaam;

    /**
     * @var string
     *
     * @ORM\Column(name="tussenvoegsel", type="string", length=20, nullable=true)
     */
    private $tussenvoegsel;

    /**
     * @var string
     *
     * @ORM\Column(name="achternaam", type="string", length=255)
     */
    private $achternaam;

    /**
     * @var string
     *
     * @ORM\Column(name="werkdagen", type="string", length=255)
     */
    private $werkdagen;

    /**
     * @var string
     *
     * @ORM\Column(name="vrijaanvraag", type="string", length=255, nullable=true)
     */
    private $vrijaanvraag;

    /**
     * @var string
     *
     * @ORM\Column(name="vakantiedagen", type="string", length=255, nullable=true)
     */
    private $vakantiedagen;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoon", type="string", length=50)
     */
    private $telefoon;

	/**
	 * @ORM\OneToMany(targetEntity="Proeflessen", mappedBy="docent_id")
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
     * Set voornaam
     *
     * @param string $voornaam
     *
     * @return Docent
     */
    public function setVoornaam($voornaam)
    {
        $this->voornaam = $voornaam;

        return $this;
    }

    /**
     * Get voornaam
     *
     * @return string
     */
    public function getVoornaam()
    {
        return $this->voornaam;
    }

    /**
     * Set tussenvoegsel
     *
     * @param string $tussenvoegsel
     *
     * @return Docent
     */
    public function setTussenvoegsel($tussenvoegsel)
    {
        $this->tussenvoegsel = $tussenvoegsel;

        return $this;
    }

    /**
     * Get tussenvoegsel
     *
     * @return string
     */
    public function getTussenvoegsel()
    {
        return $this->tussenvoegsel;
    }

    /**
     * Set achternaam
     *
     * @param string $achternaam
     *
     * @return Docent
     */
    public function setAchternaam($achternaam)
    {
        $this->achternaam = $achternaam;

        return $this;
    }

    /**
     * Get achternaam
     *
     * @return string
     */
    public function getAchternaam()
    {
        return $this->achternaam;
    }

    /**
     * Set werkdagen
     *
     * @param string $werkdagen
     *
     * @return Docent
     */
    public function setWerkdagen($werkdagen)
    {
        $this->werkdagen = $werkdagen;

        return $this;
    }

    /**
     * Get werkdagen
     *
     * @return string
     */
    public function getWerkdagen()
    {
        return $this->werkdagen;
    }

    /**
     * Set vrijaanvraag
     *
     * @param string $vrijaanvraag
     *
     * @return Docent
     */
    public function setVrijaanvraag($vrijaanvraag)
    {
        $this->vrijaanvraag = $vrijaanvraag;

        return $this;
    }

    /**
     * Get vrijaanvraag
     *
     * @return string
     */
    public function getVrijaanvraag()
    {
        return $this->vrijaanvraag;
    }

    /**
     * Set vakantiedagen
     *
     * @param string $vakantiedagen
     *
     * @return Docent
     */
    public function setVakantiedagen($vakantiedagen)
    {
        $this->vakantiedagen = $vakantiedagen;

        return $this;
    }

    /**
     * Get vakantiedagen
     *
     * @return string
     */
    public function getVakantiedagen()
    {
        return $this->vakantiedagen;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Docent
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefoon
     *
     * @param string $telefoon
     *
     * @return Docent
     */
    public function setTelefoon($telefoon)
    {
        $this->telefoon = $telefoon;

        return $this;
    }

    /**
     * Get telefoon
     *
     * @return string
     */
    public function getTelefoon()
    {
        return $this->telefoon;
    }

    /**
     * Add proeflessen
     *
     * @param \AppBundle\Entity\Proeflessen $proeflessen
     *
     * @return Docent
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
