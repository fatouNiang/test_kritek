<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $invoiceDate;

    #[ORM\Column(type: 'integer')]
    private $invoiceNumber;

    #[ORM\Column(type: 'integer')]
    private $costumerId;
    
    #[ORM\OneToMany(mappedBy: 'invoice', targetEntity: InvoiceLines::class, cascade: ["persist"])]
    private $invoceLines;

  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoiceDate(): ?\DateTimeInterface
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate(\DateTimeInterface $invoiceDate): self
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    public function getInvoiceNumber(): ?int
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(int $invoiceNumber): self
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    public function getCostumerId(): ?int
    {
        return $this->costumerId;
    }

    public function setCostumerId(int $costumerId): self
    {
        $this->costumerId = $costumerId;

        return $this;
    }
}
