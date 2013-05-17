<?php

namespace Weimi\WebBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;
use Zuo\LikeBundle\Document\LikeTopic;
use Zuo\LikeBundle\Document\Liker;

class LikerRepository extends DocumentRepository
{

    public function add($key){
        if(!$key) return false;
        $dm = $this->getDocumentManager();

        $topic = $dm->getRepository('ZuoLikeBundle:LikeTopic')
            ->get($key);
        if(!$topic){
            $topic = $dm->getRepository('ZuoLikeBundle:LikeTopic')
                ->create($key);
        }

        $obj = new Liker();


        $obj->setLikeTopic($topic);
        $dm->persist($obj);

        $topic->setNumLikes((int)$topic->getNumLikes()+1);
        $dm->persist($topic);

        $dm->flush();
        return $topic;
    }

    public function remove($key, $user){
        return false;
    }

    public function get($topic, $user){
        return false;
    }

}

