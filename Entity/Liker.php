<?php

namespace Zuo\LikeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Zuo\LikeBundle\Model\Liker as AbstractLiker;


class Liker extends AbstractLiker
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="LikeTopic", inversedBy="likers")
     * @ORM\JoinColumn(name="liketopic_id", referencedColumnName="id")
     */
    private $liketopic;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

}