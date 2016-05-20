<?php

namespace Arthem\GraphQLMapper\Demo\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Droid
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Arthem\GraphQLMapper\Demo\Entity\DroidRepository")
 */
class Droid extends Character
{
    /**
     * @var string
     *
     * @ORM\Column(name="primaryFunction", type="string", length=50)
     */
    private $primaryFunction;

    /**
     * Set primaryFunction
     *
     * @param string $primaryFunction
     *
     * @return Droid
     */
    public function setPrimaryFunction($primaryFunction)
    {
        $this->primaryFunction = $primaryFunction;

        return $this;
    }

    /**
     * Get primaryFunction
     *
     * @return string
     */
    public function getPrimaryFunction()
    {
        return $this->primaryFunction;
    }
}

