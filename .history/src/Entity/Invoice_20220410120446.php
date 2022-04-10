<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'invoice', targetEntity: InvoiceLine::class,cascade: ["persist"])]
    private $InvoiceLine;

    public function __construct()
    {
        $this->InvoiceLine = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, InvoiceLine>
     */
    public function getInvoiceLine(): Collection
    {
        return $this->InvoiceLine;
    }

    public function addInvoiceLine(InvoiceLine $invoiceLine): self
    {
        if (!$this->InvoiceLine->contains($invoiceLine)) {
            $this->InvoiceLine[] = $invoiceLine;
            $invoiceLine->setInvoice($this);
        }

        return $this;
    }

    public function removeInvoiceLine(InvoiceLine $invoiceLine): self
    {
        if ($this->InvoiceLine->removeElement($invoiceLine)) {
            // set the owning side to null (unless already changed)
            if ($invoiceLine->getInvoice() === $this) {
                $invoiceLine->setInvoice(null);
            }
        }

        return $this;
    }
}
