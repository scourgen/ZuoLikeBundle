<?php

namespace Zuo\LikeBundle\Entity;

use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class LikeTopicManager {

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var EntityRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $class;

    public function __construct(EventDispatcherInterface $dispatcher, EntityManager $em, $class)
    {
        $this->em = $em;
        $this->repository = $em->getRepository($class);

        $metadata = $em->getClassMetadata($class);
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