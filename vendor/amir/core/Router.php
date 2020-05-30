<?php

namespace amir;

class Router{

    protected static $routes = [];  // all routes array
    protected static $route = [];  // current route
    /*
     * adding new route
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    ## routing

    /*
        if route exists calls controller
        else calls 404
     */
    public static function dispatch($url)
    {

        $url = self::removeQueryString($url); ## getting query part of url

        /*
        * if route found then creating new controller class if it exists and then
        * if action exists calling it(default - indexAction) and getting View method
        */
        if(self::matchRoute($url)){

            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';

            if(class_exists($controller)){

                $controllerObject = new $controller(self::$route);

                $action = self::lowerCamelCase(self::$route['action']) . 'Action';

                if(method_exists($controllerObject, $action)){

                    $controllerObject->$action();

                    $controllerObject->getView();

                }else{
                    /**
                     * action not found
                     */
                    throw new \Exception("Метод $controller::$action не найден", 404);

                }
            }else{
                /**
                 * controller not found
                 */
                throw new \Exception("Контроллер $controller не найден", 404);
            }
        }else{
            /**
             * route not found
             */
            throw new \Exception("Страница не найдена", 404);
        }
    }


    /*
    * Searching for routes
    * true | false
    */
    public static function matchRoute($url)
    {

        foreach(self::$routes as $pattern => $route){

            /**
             * loops in $routes and checks if $url matches regular expression $pattern
             * if yes, then collects `controller/action` in the $matches array
             */
            if(preg_match("#{$pattern}#", $url, $matches)){


                /**
                 * To get rid of unnesessary values loops through matches and checks if
                 * key is string, if yes then collects it to current route value
                 */
                foreach($matches as $k => $v){

                    if(is_string($k)){
                        $route[$k] = $v;
                    }

                }
                /**
                 * if no action given, sets index action
                 */
                if(empty($route['action'])){

                    $route['action'] = 'index';

                }

                /**
                 * if prefix doesn exists adds empty prefix
                 * else adds \ to the end of prefix
                 */
                if(!isset($route['prefix'])){

                    $route['prefix'] = '';

                }else{

                    $route['prefix'] .= '\\';
                }


                $route['controller'] = self::upperCamelCase($route['controller']);

                self::$route = $route;

                return true;

            }
        }

        return false;

    }

    // CamelCase
    protected static function upperCamelCase($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    // camelCase
    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    protected static function removeQueryString($url)
    {
    if ($url) {
        $params = explode('&', $url , 2);
            if (false === strpos($params[0], '=')) {
                return rtrim($params[0],'/');
            } else {
                return '';
            }
        }
    }


}
