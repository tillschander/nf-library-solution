<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Movie extends Item
{
    /**
     * @ORM\Column(type="string", nullable=TRUE)
     */
    protected $duration;

    public function getDuration(): string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }
}