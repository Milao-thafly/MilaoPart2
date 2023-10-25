<?php

namespace App\Entity;

use App\Repository\UserPaymentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserPaymentRepository::class)]
class UserPayment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $card_name = null;


    #[ORM\Column(length: 255)]
    private ?string $payment_type = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column(length: 255)]
    private ?string $provider = null;

    #[ORM\Column(length: 255)]
    private ?string $account_no = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $expiry = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymentType(): ?string
    {
        return $this->payment_type;
    }

    public function setPaymentType(string $payment_type): static
    {
        $this->payment_type = $payment_type;

        return $this;
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

    public function getProvider(): ?string
    {
        return $this->provider;
    }

    public function setProvider(string $provider): static
    {
        $this->provider = $provider;

        return $this;
    }

    public function getAccountNo(): ?string
    {
        return $this->account_no;
    }

    public function setAccountNo(string $account_no): static
    {
        $this->account_no = $account_no;

        return $this;
    }

    public function getExpiry(): ?\DateTimeInterface
    {
        return $this->expiry;
    }

    public function setExpiry(\DateTimeInterface $expiry): static
    {
        $this->expiry = $expiry;

        return $this;
    }

    Public function getCardName()
    {
        return $this->card_name;
    }

    public function setCardName($card_name): static
    {
        $this->card_name = $card_name;

        return $this;
    }
}