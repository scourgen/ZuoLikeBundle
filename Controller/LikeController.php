<?php

namespace Zuo\LikeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Weimi\WebBundle\Document\LikeTopic;

class LikeController extends Controller
{

    /**
     * @Route("/zuo/like/show_button/{key}",name="zuo_like_show_like_button")
     * @Template()
     */
    public function showLikeButtonAction($key)
    {
        if(!$key)
            return array();

        //if not topic not exist,create one
        $manager = $this->container->get('zuo_like.manager.like_topic');

        $topic = $manager->get($key);
        if(!$topic){
            $topic = $manager->createTopic($key);
        }


        //if topic exist,fetch it.

        //get the information about the current user liked it or not.

        //get the total count of this topic
        return array();
    }


    /**
     * @Route("/zuo/like/add",name="zuo_like_like_add")
     */
    public function AddLikeAction()
    {
        $key = $this->getRequest()->get('key');
        if(!$key)
            return array();

        $user = $this->getUser();
        $ret = $this->container->get('zuo_like.manager.liker')->add($key, $user);
        if($ret instanceof LikeTopic){
            // succ like
            $code = 200;
        }elseif($ret === true){
            // had liked
            $code = 400;
        }else{
            //false
            $code = 500;
        }

        return new JsonResponse(array('code'=>$code, 'msg'=>''));
    }


    /**
     * @Route("/zuo/like/remove",name="zuo_like_like_remove")
     */
    public function RemoveLikeAction()
    {
        $key = $this->getRequest()->get('key');
        if(!$key)
            return array();

        $user = $this->getUser();
        $ret = $this->container->get('zuo_like.manager.liker')->remove($key, $user);
        ldd($ret);
        return new JsonResponse(array('code'=>$code, 'msg'=>''));
    }
}
