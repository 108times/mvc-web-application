<?php

namespace app\controllers;

use amir\Cache;

class MainController extends AppController
{

    public function indexAction()
    {
        $slides = \R::find('slider','ORDER BY `sort` ASC LIMIT 4');

        $features = \R::find('features','ORDER BY `sort` ASC LIMIT 4');

        $categories = \R::find('category',"`on_general`='1' ORDER BY `sort` ASC LIMIT 5");


        $featured_products = true;

        $latest_products = \R::find("product"," `on_general`='1' AND `new`=1 ORDER BY `sort` LIMIT 9");

        $sale_products = \R::find('product'," `on_general`='1' AND `old_price`>0  ORDER BY `sort` ASC LIMIT 9");

        $popular_products = \R::find('product',"`on_general`='1' AND `hit`='1'  ORDER BY `sort` ASC LIMIT 9");

        $daydeal = true;
        $daydeal_deal = \R::find('daydeal',"`on_general`='1' LIMIT 1");
        $daydeal_product = \R::find('product',"`id`=? LIMIT 1",[$daydeal_deal[1]->product_id]);
        // $daydeal = \compact('daydeal_deal','daydeal_product');


        $this->setData('Главная страница', 'Описание...', 'Ключевые слова');

        $this->set(\compact('slides','features','categories','featured_products','latest_products',
                           'sale_products','popular_products','daydeal','daydeal_deal','daydeal_product'));

    }

}
