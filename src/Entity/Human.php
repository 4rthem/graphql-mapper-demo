<?php

namespace Arthem\GraphQLMapper\Demo\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table
 * @ORM\Entity
 */
class Human extends Character
{
    /**
     * @var string
     *
     * @ORM\Column(name="homePlanet", type="string", length=50, nullable=true)
     */
    private $homePlanet;

    /**
     * Set homePlanet
     *
     * @param string $homePlanet
     *
     * @return Human
     */
    public function setHomePlanet($homePlanet)
    {
        $this->homePlanet = $homePlanet;

        return $this;
    }

    /**
     * Get homePlanet
     *
     * @return string
     */
    public function getHomePlanet()
    {
        return $this->homePlanet;
    }
}

