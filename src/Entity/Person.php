<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 */
class Person
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $birth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eye;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hair;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $height;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mass;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $skin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $homeworld;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $films = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $species = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $starship = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $vehicles = [];

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(type="datetime")
     */
    private $edited;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    public function __construct(array $result)
    {
        $this->name = $result['name'];
        $this->birth = $result['birth_year'];
        $this->eye = $result['eye_color'];
        $this->gender = $result['gender'];
        $this->hair = $result['hair_color'];
        $this->height = $result['height'];
        $this->mass = $result['mass'];
        $this->skin = $result['skin_color'];
        $this->homeworld = $result['homeworld'];
        $this->films = $result['films'];
        $this->species = $result['species'];
        $this->starship = $result['starships'];
        $this->vehicles = $result['vehicles'];
        $this->created =  new \DateTime($result['created']);
        $this->edited = new \DateTime($result['edited']);
        $this->url = $result['url'];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBirth(): ?string
    {
        return $this->birth;
    }

    public function setBirth(string $birth): self
    {
        $this->birth = $birth;

        return $this;
    }

    public function getEye(): ?string
    {
        return $this->eye;
    }

    public function setEye(string $eye): self
    {
        $this->eye = $eye;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getHair(): ?string
    {
        return $this->hair;
    }

    public function setHair(string $hair): self
    {
        $this->hair = $hair;

        return $this;
    }

    public function getHeight(): ?string
    {
        return $this->height;
    }

    public function setHeight(string $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getMass(): ?string
    {
        return $this->mass;
    }

    public function setMass(string $mass): self
    {
        $this->mass = $mass;

        return $this;
    }

    public function getSkin(): ?string
    {
        return $this->skin;
    }

    public function setSkin(string $skin): self
    {
        $this->skin = $skin;

        return $this;
    }

    public function getHomeworld(): ?string
    {
        return $this->homeworld;
    }

    public function setHomeworld(string $homeworld): self
    {
        $this->homeworld = $homeworld;

        return $this;
    }

    public function getFilms(): ?array
    {
        return $this->films;
    }

    public function setFilms(?array $films): self
    {
        $this->films = $films;

        return $this;
    }

    public function getSpecies(): ?array
    {
        return $this->species;
    }

    public function setSpecies(?array $species): self
    {
        $this->species = $species;

        return $this;
    }

    public function getStarship(): ?array
    {
        return $this->starship;
    }

    public function setStarship(?array $starship): self
    {
        $this->starship = $starship;

        return $this;
    }

    public function getVehicles(): ?array
    {
        return $this->vehicles;
    }

    public function setVehicles(?array $vehicles): self
    {
        $this->vehicles = $vehicles;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getEdited(): ?\DateTimeInterface
    {
        return $this->edited;
    }

    public function setEdited(\DateTimeInterface $edited): self
    {
        $this->edited = $edited;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
