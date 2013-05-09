<?php

namespace Zuo\LikeBundle\Document;

use Zuo\LikeBundle\Model\Liker as AbstractLiker;

/**
 * @MongoDB\Document(collection="liker",repositoryClass="Zuo\LikeBundle\Repository\LikerRepository"
 * @MongoDB\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Liker extends AbstractLiker
{

}