<?php

namespace App\Entity;

use App\Repository\UseradressRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UseradressRepository::class)]
class Useradress
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adress_line1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adress_line2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column]
    private ?int $postal_code = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $country = null;

    #[ORM\Column(nullable: true)]
    private ?int $telephone = null;

    #[ORM\Column(nullable: true)]
    private ?int $mobile = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getAdressLine1(): ?string
    {
        return $this->adress_line1;
    }

    public function setAdressLine1(?string $adress_line1): static
    {
        $this->adress_line1 = $adress_line1;

        return $this;
    }

    public function getAdressLine2(): ?string
    {
        return $this->adress_line2;
    }

    public function setAdressLine2(?string $adress_line2): static
    {
        $this->adress_line2 = $adress_line2;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postal_code;
    }

    public function setPostalCode(int $postal_code): static
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMobile(): ?int
    {
        return $this->mobile;
    }

    public function setMobile(?int $mobile): static
    {
        $this->mobile = $mobile;

        return $this;
    }
}
