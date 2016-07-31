<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;

/**
 * Class RouterController
 * @Route("/router")
 * @package AppBundle\Controller
 */
class RouterController extends Controller
{
    /**
     * @Route("/show/{slug}")
     */
    public function showAction($slug = '')
    {
        return $this->render('AppBundle:Router:show.html.twig', array(
            'slug' => $slug
        ));
    }


    /**
     * @Route("/advanced/{_locale}/{year}/{title}.{_format}",
     *     defaults={"_format": "html"},
     *     requirements={
     *         "_locale": "en|fr",
     *         "_format": "html|rss",
     *         "year": "\d+"
     *     }
     * )
     *
     * 这个路由定义稍微显得复杂一点：
     * 基本的路由格式：/advanced/{_locale}/{year}/{title}.{_format}
     * defaults 用于给占位符设置默认值（不传值情况采用默认值）
     * requirements 用于给占位符设置规则
     *    _local 只能是en或者fr
     *    _format只能是html或者rss
     *    year   必须是大于1位的数字
     *
     */

    public function advancedAction($_locale, $year, $title)
    {
        return $this->render('AppBundle:Router:show.html.twig', array(
            'local' => $_locale,
            'year' => $year,
            'title' => $title
        ));
    }

}
