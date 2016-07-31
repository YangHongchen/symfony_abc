<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/index")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Lucky:index.html.twig', array(// ...
        ));
    }

    /**
     * 该页面用于访问一个生成一个随机数，并打印到页面
     * 路由的name制定该路由的别名，也可以不指定，路由会自动生成
     * 可以同如下的命令查看当前所有定义的路由
     * [root@108 sf.test.com]# bin/console debug:router
     * -------------------------- -------- -------- ------ -----------------------------------
     * Name                       Method   Scheme   Host   Path
     * -------------------------- -------- -------- ------ -----------------------------------
     * _wdt                       ANY      ANY      ANY    /_wdt/{token}
     *
     * ....[省略]
     *
     * homepage                   ANY      ANY      ANY    /
     * app_lucky_index            ANY      ANY      ANY    /lucky/index
     * lucky_number               ANY      ANY      ANY    /lucky/number
     * -------------------------- -------- -------- ------ -----------------------------------
     * @Route("/lucky/number",name="lucky_number")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

        return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }

}
