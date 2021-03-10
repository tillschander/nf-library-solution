<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Book extends Item
{
    /**
     * @ORM\Column(type="integer", nullable=TRUE)
     */
    protected $isbn;

    public function getIsbn(): int
    {
        return $this->isbn;
    }

    public function setIsbn(int $isbn): void
    {
        $this->isbn = $isbn;
    }
}