<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class RouterController
 * @Route("/router")
 * @package AppBundle\Controller
 */
class RouterController extends Controller
{
    /**
     * @Route("/show/{slug}",name="router_show")
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

    /**
     * 根据路由规则，生成一个URL
     * 使用generateUrl方法
     * 第一个参数：路由的名称；
     * 第二个参数：附带的查询参数
     * @Route("/generate_url/page/{page}",
     *  defaults={"page":1},
     *  name="router_generate_url")
     */
    public function generateUrlAction($page)
    {
        // /blog/my-blog-post
        $url = $this->generateUrl(
            'router_generate_url',
            array(
                'page' => $page,
            )
        );

        // 上面的写法是一种简洁的写法，其实他的真实调用情况是是下面的
        // 这里涉及到Container（容器）的概念，我们这里不做过多的讲解。
        // $url = $this->container->get('router')->generate(
        //     'blog_show',
        //     array('slug' => 'my-blog-post')
        // );

        echo $url;
        exit;
    }

    /**
     * 生成一个绝对路径的URL
     * @Route("/generate_absolute_url/page/{page}",
     *     defaults={"page":1},
     *     name="generate_absolute_url")
     */
    public function generate_absolute_urlAction($page)
    {
        $url = $this->generateUrl('generate_absolute_url', array('page' => $page), UrlGeneratorInterface::ABSOLUTE_URL);
        echo $url;
        exit;
    }

}
