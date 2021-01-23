<?php

namespace App\Entity;

use App\Repository\StoreCartRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StoreCartRepository::class)
 */
class StoreCart
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
    private $sessionId;

    /**
     * @ORM\ManyToOne(targetEntity=StoreItems::class, inversedBy="storeCarts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $storeItem;

    /**
     * @ORM\Column(type="integer")
     */
    private $count;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    public function setSessionId(string $sessionId): self
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    public function getStoreItem(): ?StoreItems
    {
        return $this->storeItem;
    }

    public function setStoreItem(?StoreItems $storeItem): self
    {
        $this->storeItem = $storeItem;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }
}
