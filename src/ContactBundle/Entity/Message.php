<?php

namespace ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="ContactBundle\Repository\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="emetteur", type="string", length=255)
     */
    private $emetteur;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDamande", type="datetime")
     */
    private $dateDamande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateTaitement", type="datetime", nullable=true)
     */
    private $dateTaitement;

    /**
     * @var string
     *
     * @ORM\Column(name="corps", type="text")
     */
    private $corps;

    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=255)
     */
    private $objet;

    /**
     * @var bool
     *
     * @ORM\Column(name="traite", type="boolean")
     */
    private $traite = false;


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
     * Set emetteur
     *
     * @param string $emetteur
     *
     * @return Message
     */
    public function setEmetteur($emetteur)
    {
        $this->emetteur = $emetteur;

        return $this;
    }

    /**
     * Get emetteur
     *
     * @return string
     */
    public function getEmetteur()
    {
        return $this->emetteur;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Message
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
     * Set dateDamande
     *
     * @param \DateTime $dateDamande
     *
     * @return Message
     */
    public function setDateDamande($dateDamande)
    {
        $this->dateDamande = $dateDamande;

        return $this;
    }

    /**
     * Get dateDamande
     *
     * @return \DateTime
     */
    public function getDateDamande()
    {
        return $this->dateDamande;
    }

    /**
     * Set dateTaitement
     *
     * @param \DateTime $dateTaitement
     *
     * @return Message
     */
    public function setDateTaitement($dateTaitement)
    {
        $this->dateTaitement = $dateTaitement;

        return $this;
    }

    /**
     * Get dateTaitement
     *
     * @return \DateTime
     */
    public function getDateTaitement()
    {
        return $this->dateTaitement;
    }

    /**
     * Set corps
     *
     * @param string $corps
     *
     * @return Message
     */
    public function setCorps($corps)
    {
        $this->corps = $corps;

        return $this;
    }

    /**
     * Get corps
     *
     * @return string
     */
    public function getCorps()
    {
        return $this->corps;
    }

    /**
     * Set objet
     *
     * @param string $objet
     *
     * @return Message
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set traite
     *
     * @param boolean $traite
     *
     * @return Message
     */
    public function setTraite($traite)
    {
        $this->traite = $traite;

        return $this;
    }

    /**
     * Get traite
     *
     * @return bool
     */
    public function getTraite()
    {
        return $this->traite;
    }
}

