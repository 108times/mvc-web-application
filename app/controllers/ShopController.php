<?php

namespace app\controllers;

class ShopController extends AppController
{

public function indexAction() {

    // info blocks info

    $product = \R::find("product"," `status`='1' ORDER BY `sort` LIMIT " . LIMIT);

    $category = \R::find('category'," ORDER BY `sort` ASC LIMIT 5");

    $this->setData('Shop','Description...','keywords..');

    $this->set(\compact('product','category'));
}


}
