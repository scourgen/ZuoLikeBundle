<?php

namespace Zuo\LikeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class LikeController extends Controller
{

    /**
     * @Route("/like",name="zuo_like_show_like_button")
     * @Template
     */
    public function showLikeButtonAction()
    {
        $key=$this->getRequest()->get('key');

        //if not topic not exist,create one
        $manager = $this->container->get('zuo_like.manager.like_topic');

        $topic = $manager->getTopicByKey($key);

        ldd($topic);

        //if topic exist,fetch it.

        //get the information about the current user liked it or not.

        //get the total count of this topic
        return array();
    }
}
