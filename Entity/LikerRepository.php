<?php

namespace Zuo\LikeBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Zuo\LikeBundle\Entity\LikeTopic;
use Zuo\LikeBundle\Entity\Liker;

class LikerRepository extends EntityRepository
{
    public function add($key){
        if(!$key) return false;
        $em = $this->getEntityManager();

        $topic = $em->getRepository('ZuoLikeBundle:LikeTopic')
            ->find($key);
        if(!$topic){
            $topic = $em->getRepository('ZuoLikeBundle:LikeTopic')
                ->create($key);
        }

        $obj = new Liker();


        $obj->setLikeTopic($topic);
        $em->persist($obj);

        $topic->setNumLikes((int)$topic->getNumLikes()+1);
        $em->persist($topic);

        $em->flush();
        return $topic;
    }

    public function remove($key, $user){
        return false;
    }

    public function get($topic, $user){
        return false;
    }

}

