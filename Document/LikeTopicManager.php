<?php

namespace Zuo\LikeBundle\Document;

use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\EventDispatcher\EventDispatcher;

class LikeTopicManager {
    public function __construct(EventDispatcher $dispatcher, DocumentManager $dm, $class){
        $this->dm = $dm;
        //$this->repository = $dm->getRepository($class);
        $this->repository = $dm->getRepository("Weimi\WebBundle\Document\LikeTopic");
        //ldd($class, $this->repository);
    }

    public function isTopicExists($key){
        return $this->repository->isExists($key);
    }

    public function getTopicByKey($key){
        return $this->repository->getByKey($key) ?: $this->createTopic($key);
    }

    public function createTopic($key){
        return $this->repository->create($key);
    }
}