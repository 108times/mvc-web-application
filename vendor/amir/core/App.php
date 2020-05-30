<?php

namespace amir;

class App{

    public static $app;

    public function __construct(){

        $query = trim($_SERVER['QUERY_STRING'], '/');

        session_start();
        // echo($_SERVER['PHP_SELF'] . $_SERVER['REQUEST_URI']);
        self::$app = Registry::instance(); ## initializing registry

        $this->getParams(); ## getting app params

        new ErrorHandler(); ## initializing ErrorHandler

        Router::dispatch($query); ## start routing

    }

    protected function getParams(){

        $params = require_once CONF . '/params.php';

        if( !empty($params) ){

            foreach($params as $k => $v){

                self::$app->setProperty($k, $v);

            }

        }
    }

}
