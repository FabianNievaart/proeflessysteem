<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proeflessen
 *
 * @ORM\Table(name="proeflessen")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProeflessenRepository")
 */
class Proeflessen
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
     * @ORM\Column(name="begintijd", type="string", length=10)
     */
    private $begintijd;

    /**
     * @var string
     *
     * @ORM\Column(name="eindtijd", type="string", length=10)
     */
    private $eindtijd;

    /**
     * @var string
     *
     * @ORM\Column(name="datum", type="string", length=255)
     */
    private $datum;

	/**
	 * @ORM\ManyToOne(targetEntity="Locatie", inversedBy="Locaties")
	 * @ORM\JoinColumn(name="locatie_id", referencedColumnName="id")
	 */
	private $locatie_id;

	/**
	 * @ORM\ManyToOne(targetEntity="Sport", inversedBy="Sporten")
	 * @ORM\JoinColumn(name="sport_id", referencedColumnName="id")
	 */
	private $sport_id;

	/**
	 * @ORM\ManyToOne(targetEntity="Docent", inversedBy="Docenten")
	 * @ORM\JoinColumn(name="docent_id", referencedColumnName="id")
	 */
	private $docent_id;

	/**
	 * @ORM\ManyToOne(targetEntity="Klant", inversedBy="Klanten")
	 * @ORM\JoinColumn(name="klant_id", referencedColumnName="id")
	 */
	private $klant_id;


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
     * Set begintijd
     *
     * @param string $begintijd
     *
     * @return Proeflessen
     */
    public function setBegintijd($begintijd)
    {
        $this->begintijd = $begintijd;

        return $this;
    }

    /**
     * Get begintijd
     *
     * @return string
     */
    public function getBegintijd()
    {
        return $this->begintijd;
    }

    /**
     * Set eindtijd
     *
     * @param string $eindtijd
     *
     * @return Proeflessen
     */
    public function setEindtijd($eindtijd)
    {
        $this->eindtijd = $eindtijd;

        return $this;
    }

    /**
     * Get eindtijd
     *
     * @return string
     */
    public function getEindtijd()
    {
        return $this->eindtijd;
    }

    /**
     * Set datum
     *
     * @param string $datum
     *
     * @return Proeflessen
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;

        return $this;
    }

    /**
     * Get datum
     *
     * @return string
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Set locatieId
     *
     * @param \AppBundle\Entity\Locatie $locatieId
     *
     * @return Proeflessen
     */
    public function setLocatieId(\AppBundle\Entity\Locatie $locatieId = null)
    {
        $this->locatie_id = $locatieId;

        return $this;
    }

    /**
     * Get locatieId
     *
     * @return \AppBundle\Entity\Locatie
     */
    public function getLocatieId()
    {
        return $this->locatie_id;
    }

    /**
     * Set sportId
     *
     * @param \AppBundle\Entity\Sport $sportId
     *
     * @return Proeflessen
     */
    public function setSportId(\AppBundle\Entity\Sport $sportId = null)
    {
        $this->sport_id = $sportId;

        return $this;
    }

    /**
     * Get sportId
     *
     * @return \AppBundle\Entity\Sport
     */
    public function getSportId()
    {
        return $this->sport_id;
    }

    /**
     * Set docentId
     *
     * @param \AppBundle\Entity\Docent $docentId
     *
     * @return Proeflessen
     */
    public function setDocentId(\AppBundle\Entity\Docent $docentId = null)
    {
        $this->docent_id = $docentId;

        return $this;
    }

    /**
     * Get docentId
     *
     * @return \AppBundle\Entity\Docent
     */
    public function getDocentId()
    {
        return $this->docent_id;
    }

    /**
     * Set klantId
     *
     * @param \AppBundle\Entity\Klant $klantId
     *
     * @return Proeflessen
     */
    public function setKlantId(\AppBundle\Entity\Klant $klantId = null)
    {
        $this->klant_id = $klantId;

        return $this;
    }

    /**
     * Get klantId
     *
     * @return \AppBundle\Entity\Klant
     */
    public function getKlantId()
    {
        return $this->klant_id;
    }
}
