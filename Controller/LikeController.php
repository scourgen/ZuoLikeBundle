<?php

namespace Zuo\LikeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/zuo/like")
 */
class LikeController extends Controller
{

    /**
     * @Route("/show_button/{key}",name="zuo_like_show_like_button")
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

        return array('topic'=>$topic);
    }


    /**
     * @Route("/add",name="zuo_like_like_add")
     */
    public function AddLikeAction()
    {
        $key = $this->getRequest()->get('key');
        if(!$key)
            return array();

        $user = $this->getUser();
        $ret = $this->container->get('zuo_like.manager.liker')->add($key, $user);
        if(is_object($ret)){
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
     * @Route("/remove",name="zuo_like_like_remove")
     */
    public function RemoveLikeAction()
    {
        $key = $this->getRequest()->get('key');
        if(!$key)
            return array();

        $user = $this->getUser();
        $ret = $this->container->get('zuo_like.manager.liker')->remove($key, $user);
        if($ret && isset($ret['n']) && $ret['n'] == 1){
            $code = 200;
        }else{
            $code = 500;
        }
        return new JsonResponse(array('code'=>$code, 'msg'=>''));
    }
}
