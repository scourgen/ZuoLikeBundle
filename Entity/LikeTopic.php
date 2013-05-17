<?php

namespace Zuo\LikeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Zuo\LikeBundle\Model\LikeTopic as AbstractLikeTopic;


class LikeTopic extends AbstractLikeTopic
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=30)
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $numLikes = 0;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $type;

    /**
     * @ORM\OneToMany(targetEntity="Liker", mappedBy="liketopic")
     */
    private $likers;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

}