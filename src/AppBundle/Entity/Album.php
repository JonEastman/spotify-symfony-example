<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AlbumRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Album
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    protected  $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime")
     */
    private $modified;

    /**
     * @var string
     *
     * @ORM\Column(name="spotify_id", type="string", length=50)
     */
    private $spotifyId;

    /**
     * External URL (will take user to Spotify Homepage)
     *
     * @var string
     *
     * @ORM\Column(name="spotify_url", type="string", length=255)
     */
    private $spotifyUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="href", type="string", length=255)
     */
    private $href;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="uri", type="string", length=255)
     */
    private $uri;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="album_type", type="string", length=50)
     */
    private $albumType;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Track", mappedBy="album")
     *
     */
    private $tracks;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Image", mappedBy="album")
     *
     */
    private $images;

    public function __construct()
    {
        $this->created = new \DateTime();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $albumType
     */
    public function setAlbumType($albumType)
    {
        $this->albumType = $albumType;
    }

    /**
     * @return string
     */
    public function getAlbumType()
    {
        return $this->albumType;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param string $href
     */
    public function setHref($href)
    {
        $this->href = $href;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param \DateTime $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    /**
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $spotifyId
     */
    public function setSpotifyId($spotifyId)
    {
        $this->spotifyId = $spotifyId;
    }

    /**
     * @return string
     */
    public function getSpotifyId()
    {
        return $this->spotifyId;
    }

    /**
     * @param string $spotifyUrl
     */
    public function setSpotifyUrl($spotifyUrl)
    {
        $this->spotifyUrl = $spotifyUrl;
    }

    /**
     * @return string
     */
    public function getSpotifyUrl()
    {
        return $this->spotifyUrl;
    }

    /**
     * @return mixed
     */
    public function getTracks()
    {
        return $this->tracks;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updateModifiedDatetime()
    {
        $this->setModified(new \DateTime());
    }
}
