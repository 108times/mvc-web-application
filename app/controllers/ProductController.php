<?php

namespace app\controllers;

use Exception;

class ProductController extends AppController
{
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $product = \R::findOne('product', "`status`='1' AND `alias`=?",[$alias]);

        if (!$product) {
            throw new Exception('Страница не найдена', '404');
        }

        // breadcrumbs

        // related products

        // record cookie that it is visisted

        // get visited products

        // gallery

        // modifications

        $this->setData($product->title,$product->description,$product->keywords);
        $this->set(compact('product'));

    }
}
