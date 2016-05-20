<?php

namespace Arthem\GraphQLMapper\Demo\Entity;

use Doctrine\ORM\EntityRepository;

class CharacterRepository extends EntityRepository
{
    /**
     * @param int $episode
     * @return Character|null
     */
    public function getHero($episode = null)
    {
        if (5 === $episode) {
            return $this->find(1000);
        }

        return $this->find(2001);
    }
}
