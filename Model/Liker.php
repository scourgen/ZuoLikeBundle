<?php
namespace Zuo\LikeBundle\Model;

use DateTime;
use InvalidArgumentException;

abstract class Liker
{
    protected $id;

    protected $likeTopic;

    protected $user_id;

    protected $createdAt;

    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->createdAt = new DateTime();
    }

    public function getLikeTopic()
    {
        return $this->likeTopic;
    }

    public function setLikeTopic($likeTopic)
    {
        $this->likeTopic = $likeTopic;
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