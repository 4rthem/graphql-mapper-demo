<?php

namespace Arthem\GraphQLMapper\Demo\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Arthem\GraphQLMapper\Demo\Entity\CharacterRepository")
 * @ORM\Table(name="sw_characters")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"human" = "Human", "droid" = "Droid"})
 */
abstract class Character
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    protected $name;

    /**
     * @var Character[]
     * @ORM\ManyToMany(targetEntity="Arthem\GraphQLMapper\Demo\Entity\Character", cascade={"persist"}, inversedBy="friends")
     * @ORM\JoinTable(name="friend")
     */
    protected $friends;

    /**
     * @var array
     *
     * @ORM\Column(name="appearsIn", type="json_array", nullable=true)
     */
    protected $appearsIn;

    public function __construct()
    {
        $this->friends = new ArrayCollection();
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
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Droid
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set appearsIn
     *
     * @param array $appearsIn
     *
     * @return Droid
     */
    public function setAppearsIn($appearsIn)
    {
        $this->appearsIn = $appearsIn;

        return $this;
    }

    /**
     * Get appearsIn
     *
     * @return array
     */
    public function getAppearsIn()
    {
        return $this->appearsIn ?: [];
    }

    public function addFriend(Character $friend)
    {
        $this->friends->add($friend);

        return $this;
    }

    public function removeFriend(Character $friend)
    {
        $this->friends->removeElement($friend);

        return $this;
    }

    /**
     * @return Character[]
     */
    public function getFriends()
    {
        return $this->friends;
    }
}

