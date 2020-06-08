<?php

namespace app\controllers;

use amir\App;

class CurrencyController extends AppController
{
    public function changeAction()
    {
        /**
         * if get['curr'] is not empty
         * then checking if currencies has index with needed code
         * if it has then setting currency cookie
         */
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;
        if($currency) {
            $currencies = App::$app->getProperty('currencies');
            $curr = $currencies[$currency];
            if (!empty($curr)) {
                \setcookie('currency',$currency,time() + 3600 * 24 * 7,'/');
            }
        }
        \redirect(PATH);
    }
}
