<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
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
    private $field0;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $field2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getField0(): ?string
    {
        return $this->field0;
    }

    public function setField0(string $field0): self
    {
        $this->field0 = $field0;

        return $this;
    }

    public function getField2(): ?int
    {
        return $this->field2;
    }

    public function setField2(?int $field2): self
    {
        $this->field2 = $field2;

        return $this;
    }
}
