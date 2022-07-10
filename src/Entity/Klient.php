<?php

namespace App\Entity;

use App\Repository\KlientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KlientRepository::class)]
class Klient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $imie;

    #[ORM\Column(type: 'string', length: 255)]
    private $nazwisko;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $przyczepa;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $namiot;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $samochod;

    #[ORM\Column(type: 'date')]
    private $dataPrzyjazdu;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dataOdjazdu;

    #[ORM\Column(type: 'integer')]
    private $iloscOsob;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImie(): ?string
    {
        return $this->imie;
    }

    public function setImie(?string $imie): self
    {
        $this->imie = $imie;

        return $this;
    }

    public function getNazwisko(): ?string
    {
        return $this->nazwisko;
    }

    public function setNazwisko(string $nazwisko): self
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    public function isPrzyczepa(): ?bool
    {
        return $this->przyczepa;
    }

    public function setPrzyczepa(?bool $przyczepa): self
    {
        $this->przyczepa = $przyczepa;

        return $this;
    }

    public function isNamiot(): ?bool
    {
        return $this->namiot;
    }

    public function setNamiot(?bool $namiot): self
    {
        $this->namiot = $namiot;

        return $this;
    }

    public function isSamochod(): ?bool
    {
        return $this->samochod;
    }

    public function setSamochod(?bool $samochod): self
    {
        $this->samochod = $samochod;

        return $this;
    }

    public function getDataPrzyjazdu(): ?\DateTimeInterface
    {
        return $this->dataPrzyjazdu;
    }

    public function setDataPrzyjazdu(\DateTimeInterface $dataPrzyjazdu): self
    {
        $this->dataPrzyjazdu = $dataPrzyjazdu;

        return $this;
    }

    public function getDataOdjazdu(): ?\DateTimeInterface
    {
        return $this->dataOdjazdu;
    }

    public function setDataOdjazdu(?\DateTimeInterface $dataOdjazdu): self
    {
        $this->dataOdjazdu = $dataOdjazdu;

        return $this;
    }

    public function getIloscOsob(): ?int
    {
        return $this->iloscOsob;
    }

    public function setIloscOsob(int $iloscOsob): self
    {
        $this->iloscOsob = $iloscOsob;

        return $this;
    }
}
