<?php

namespace Zuo\LikeBundle\Document;

use Zuo\LikeBundle\Model\LikeTopic as AbstractLikeTopic;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="liker",repositoryClass="Zuo\LikeBundle\Document\LikerRepository"
 * @MongoDB\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class LikeTopic extends AbstractLikeTopic
{

}