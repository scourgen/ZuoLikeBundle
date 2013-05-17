<?php

namespace Zuo\LikeBundle\Document;

use Zuo\LikeBundle\Model\Liker as AbstractLiker;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="liker",repositoryClass="Zuo\LikeBundle\Document\LikerRepository"
 * @MongoDB\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Liker extends AbstractLiker
{

}