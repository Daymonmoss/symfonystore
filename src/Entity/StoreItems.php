<?php

namespace App\Entity;

use App\Repository\StoreItemsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StoreItemsRepository::class)
 */
class StoreItems
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=StoreCart::class, mappedBy="storeItem", orphanRemoval=true)
     */
    private $storeCarts;

    public function __construct()
    {
        $this->storeCarts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|StoreCart[]
     */
    public function getStoreCarts(): Collection
    {
        return $this->storeCarts;
    }

    public function addStoreCart(StoreCart $storeCart): self
    {
        if (!$this->storeCarts->contains($storeCart)) {
            $this->storeCarts[] = $storeCart;
            $storeCart->setStoreItem($this);
        }

        return $this;
    }

    public function removeStoreCart(StoreCart $storeCart): self
    {
        if ($this->storeCarts->removeElement($storeCart)) {
            // set the owning side to null (unless already changed)
            if ($storeCart->getStoreItem() === $this) {
                $storeCart->setStoreItem(null);
            }
        }

        return $this;
    }
}
