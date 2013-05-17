<?php

namespace Weimi\WebBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;
use Weimi\WebBundle\Document\LikeTopic;

class LikeTopicRepository extends DocumentRepository
{

    public function create($key, $type){
        if(!$key) return array();

        $dm = $this->getDocumentManager();
        $new = new LikeTopic();
        $new->setId($key);
        $new->setType($type);
        $new->setNumLikes(0);

        $dm->persist($new);
        $dm->flush();
        return $new;
    }
    
    public function isExists($key){
        return $this->get($key) ? true : false;
    }

    public function get($key){
        return $this->findOneBy(array('_id' => $key));
    }

}

