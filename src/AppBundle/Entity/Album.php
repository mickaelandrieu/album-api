<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource
 * @ORM\Entity
 */
class Album
{
    /**
     * @var int The entity Id
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string Path to the Album cover file.
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $cover = '';

    /**
     * @var string The Album title.
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    private $title = '';

    /**
     * @var string The Album author.
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    private $author = '';

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Song", mappedBy="album")
     */
    protected $songs;

    public function __construct()
    {
        $this->songs = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCover() : string
    {
        return $this->cover;
    }

    public function setCover(string $cover)
    {
        $this->cover = $cover;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getAuthor() : string
    {
        return $this->author;
    }

    public function setAuthor(string $author)
    {
        $this->author = $author;
    }
}
