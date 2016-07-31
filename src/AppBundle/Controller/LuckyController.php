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


    /**
     * 渲染一个模板：
     * 这里要做到是通过控制器展现指定的模板的内容
     * @Route("/lucky/render_a_template")
     */
    public function render_a_templateAction()
    {
        $number = mt_rand(0, 100);

        // 注意: 模板文件位置不同render方法的第一个参数的写法则不一样:

        //模板在AppBundle/Resource/View/luck目录
        return $this->render('AppBundle:Lucky:render.html.twig', array(
            'number' => $number
        ));

        //模板在 app/view/lucky 目录，可以采用以下写法：
        //原因在于app/Resouce/views目录相当于是一个模板全局目录，其他bundle都可以直接访问，误区前缀，直接访问该目录下的文件和子目录

        // return $this->render('lucky/render.html.twig', array(
        //     'number' => $number
        // ));
    }


}
