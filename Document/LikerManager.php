<?php

namespace Zuo\LikeBundle\Document;

use Doctrine\ODM\MongoDB\DocumentManager;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class LikerManager {
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


    public function get($topic, $user){
        return $this->repository->get($topic, $user);
    }

    public function add($key, $user=null){
        return $this->repository->add($key, $user);
    }

    public function remove($key, $user=null){
        return $this->repository->remove($key, $user);
    }


}