<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource
 * @ORM\Entity
 */
class Song
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
     * @var string Base64 Song file.
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $song = '';

    /**
     * @var string The Song title.
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    private $title = '';

    /**
     * @var Album The Album song belongs to.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Album", inversedBy="songs")
     * @ORM\JoinColumn(name="song_id", referencedColumnName="id")
     */
    private $album;


    public function getId()
    {
        return $this->id;
    }

    public function getSong() : string
    {
        return $this->song;
    }

    public function setSong(string $song)
    {
        $this->song = $song;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getAlbum()
    {
        return $this->album;
    }

    public function setAlbum(Album $album)
    {
        $this->album = $album;
        $this->album->getSongs()->add($this);
    }
}
