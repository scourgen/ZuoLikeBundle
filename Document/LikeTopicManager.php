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
        return $this->repository->isExists($key);
    }

    public function get($key){
        return $this->repository->get($key);
    }

    public function createTopic($key, $type=null){
        return $this->repository->create($key, $type);
    }

}