<?php

namespace app\widgets\currency;

use amir\App;

class Currency
{
    protected $tpl; ## template
    protected $currencies; ## all currencies
    protected $currency; ## active currency

    public function __construct()
    {
        $this->tpl = __DIR__ . '/currency_tpl/currency.php';
        $this->run();
    }

    protected function run()
    {
        $this->currencies = App::$app->getProperty('currencies');
        $this->currency = App::$app->getProperty('currency');
        echo $this->getHtml();
    }

    public static function getCurrencies()
    {
        return \R::getAssoc("SELECT code,title,symbol_left,symbol_right,value,base
                             FROM `currency` ORDER BY `base` DESC");

    }

    public static function getCurrency($currencies) ## gets active currency
    {
        /**
         * if currency exists in cookies and if cookie currency exists in $currencies
         * then setting $key that equals to cookie currency
         * else getting current item from $currencies
         */
        if (isset($_COOKIE['currency']) && \array_key_exists($_COOKIE['currency'],$currencies)) {
            $key = $_COOKIE['currency'];
        } else {
            $key = key($currencies); ## returns current array index (0)
        }

        $currency = $currencies[$key];
        $currency['code'] = $key;
        return $currency;
    }

    protected function getHtml()
    {
        \ob_start();
        require_once $this->tpl;
        return \ob_get_clean();
    }
}
