<?php

namespace Arthem\GraphQLMapper\Demo\Entity;

use Doctrine\ORM\EntityRepository;

class DroidRepository extends EntityRepository
{
    /**
     * @param string $id
     * @param string $name
     * @param string $primaryFunction
     * @param array  $appearsIn
     * @return Droid
     */
    public function createDroid($id, $name, $primaryFunction, array $appearsIn = [])
    {
        $droid = new Droid();

        $droid
            ->setId($id)
            ->setName($name)
            ->setPrimaryFunction($primaryFunction)
            ->setAppearsIn($appearsIn);

        $this->_em->persist($droid);
        $this->_em->flush();

        return $droid;
    }
}
