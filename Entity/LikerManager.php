<?php

namespace Zuo\LikeBundle\Entity;

use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class LikerManager {
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