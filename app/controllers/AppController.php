<?php

namespace app\controllers;

use amir\App;
use amir\base\Controller;
use amir\Cache;
use app\models\AppModel;
use app\widgets\currency\Currency;


class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);

        new AppModel();

        /**
         * collecting currencies to the Registry
         */
        App::$app->setProperty('currencies',Currency::getCurrencies());

        /**
         * collecting current currency to the Registry
         */
        App::$app->setProperty('currency', Currency::getCurrency( App::$app->getProperty('currencies') ) );

        /**
         * collecting categories to the Registry
         */
        App::$app->setProperty('menu', self::cacheMenu());
        App::$app->setProperty('categories', self::cacheCategory());
    }

    public static function cacheMenu() {
        /**
         *  If categories are cached collecting them in $cats
         *  else selecting them from database
         *  returns categories array
         */
        $cache = Cache::instance();
        $menu = $cache->get('menu');

        if(!$menu) {
            $menu = \R::getAssoc("SELECT * FROM `menu` WHERE `status`='1' ORDER BY `id`");
            $cache->set('menu',$menu);
        }
        return $menu;

    }

    public static function cacheCategory() {
        /**
         *  If categories are cached collecting them in $cats
         *  else selecting them from database
         *  returns categories array
         */
        $cache = Cache::instance();
        $cats = $cache->get('cats');

        if(!$cats) {
            $cats = \R::getAssoc("SELECT * FROM `category` WHERE `status`='1' ORDER BY `sort`");
            $cache->set('cats',$cats);
        }
        return $cats;

    }

}
