<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Record extends Item
{
    /**
     * @ORM\Column(type="integer", nullable=TRUE)
     */
    protected $label;

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }
}