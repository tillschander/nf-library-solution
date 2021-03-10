<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
    
/**
 * @ORM\Entity
 * @ORM\Table(name="items")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "item" = "Item",
 *      "book" = "Book",
 *      "record" = "Record",
 *      "movie" = "Movie"
 * })
 */
abstract class Item
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $coverUrl;

    /**
     * @ORM\Column(type="string")
     */
    protected $artist;

    /**
     * @ORM\Column(type="date")
     */
    protected $releaseDate;
    
    /**
    * @ORM\ManyToOne(targetEntity="Category", inversedBy="items")
    */
    protected $category;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCoverUrl()
    {
        return $this->coverUrl;
    }

    public function setCoverUrl($coverUrl)
    {
        $this->coverUrl = $coverUrl;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getType()
    {
        if($this instanceof Book) return 'book';
        if($this instanceof Record) return 'record';
        if($this instanceof Movie) return 'video';
        return 'item';
    }
}