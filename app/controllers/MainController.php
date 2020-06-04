<?php

namespace app\controllers;

use amir\Cache;
use R;

class MainController extends AppController
{

    public function indexAction()
    {
        $slides = \R::find("slider"," ORDER BY `sort` ASC LIMIT 4");

        $features = \R::find("features"," ORDER BY `sort` ASC LIMIT 4");

        $categories = \R::find('category'," `on_general`='1' ORDER BY `sort` ASC LIMIT 5");


        $featured_products = true;

        $featured_products_info = \R::find('info_blocks',"`status`='1' AND `name`='featured products' LIMIT 1");

        $latest_products = \R::find("product"," `status`='1' AND `on_general`='1' AND `new`=1 ORDER BY `sort` LIMIT 9");

        $sale_products = \R::find('product'," `status`='1' AND `on_general`='1' AND `old_price`>0  ORDER BY `sort` ASC LIMIT 9");

        $popular_products = \R::find('product'," `status`='1' AND `on_general`='1' AND `hit`='1'  ORDER BY `sort` ASC LIMIT 9");


        $daydeal = true;

        $daydeal_deal = \R::find('daydeal'," `status`='1' AND `on_general`='1' LIMIT 1");

        $daydeal_product = \R::find('product'," `status`='1' AND `id`=? LIMIT 1",[$daydeal_deal[1]->product_id]);


        $blogs_info = \R::find('info_blocks',"`status`='1' AND `name`='blog' LIMIT 1");

        $blogs = \R::find('blog',"`status`='1' AND `on_general`='1' ORDER BY `sort` LIMIT 3");

        $this->setData('Главная страница', 'Описание...', 'Ключевые слова');

        $this->set(\compact('slides','features','categories','featured_products','featured_products_info',
                            'latest_products','sale_products','popular_products','daydeal','daydeal_deal',
                            'daydeal_product','blogs_info','blogs'));

    }

}
