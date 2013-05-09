<?php
namespace Zuo\LikeBundle\Model;

use DateTime;

abstract class LikeTopic
{
    protected $id;

    protected $key;

    /**
     * 1 => save user
     * 0 => anonymous
     */
    protected $type;

    protected $numLikes = 0;

    protected $createdAt;

    public function __construct()
    {
        $this->createdAt = new DateTime();
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getNumLikes()
    {
        return $this->numLikes;
    }

    public function setNumLikes($numLikes)
    {
        $this->numLikes = $numLikes;
    }

    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}