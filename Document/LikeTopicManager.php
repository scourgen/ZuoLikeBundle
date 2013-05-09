<?php

namespace Zuo\LikeBundle\Document;

use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class LikeTopicManager {

    /**
     * @var DocumentManager
     */
    protected $dm;

    /**
     * @var DocumentRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $class;

    public function __construct(EventDispatcherInterface $dispatcher, DocumentManager $dm, $class)
    {
        $this->dm = $dm;
        $this->repository = $dm->getRepository($class);

        $metadata = $dm->getClassMetadata($class);
        $this->class = $metadata->name;
    }

    public function isTopicExists($key){
        if(1==1){
            return true;
        }else{
            return false;
        }
    }

    public function getTopicByKey($key){
        if(1==1){
            return array();
        }else{
            return null;
        }
    }

    public function createTopic($key){
        return true;
    }
}