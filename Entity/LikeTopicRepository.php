<?php

namespace Zuo\LikeBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Zuo\LikeBundle\Entity\LikeTopic;

class LikeTopicRepository extends EntityRepository
{

    public function create($key, $type){
        if(!$key) return array();

        $em = $this->getEntityManager();
        $new = new LikeTopic();
        $new->setId($key);
        $new->setType($type);
        $new->setNumLikes(0);

        $em->persist($new);
        $em->flush();
        return $new;
    }

    public function isExists($key){
        return $this->find($key) ? true : false;
    }

    public function get($key){
        return $this->find($key);
    }
}

