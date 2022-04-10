<?php

namespace App\Entity;

use App\Repository\AvoiceLineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvoiceLineRepository::class)]
class InvoiceLine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $decription;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $amount;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $amount_TVA;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $totalTVA;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDecription(): ?string
    {
        return $this->decription;
    }

    public function setDecription(string $decription): self
    {
        $this->decription = $decription;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getAmountTVA(): ?string
    {
        return $this->amount_TVA;
    }

    public function setAmountTVA(string $amount_TVA): self
    {
        $this->amount_TVA = $amount_TVA;

        return $this;
    }

    public function getTotalTVA(): ?string
    {
        return $this->totalTVA;
    }

    public function setTotalTVA(string $totalTVA): self
    {
        $this->totalTVA = $totalTVA;

        return $this;
    }
}
