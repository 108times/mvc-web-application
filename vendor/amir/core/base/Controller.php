<?php

namespace amir\base;

/*
 *
 * Core Controller
 *
 */
abstract class Controller
{
    public $route; // current route
    public $prefix;

    public $controller;
    public $model;
    public $view;
    public $layout;

    public $data = [];
    public $meta = ['title' => '', 'desc' => '', 'keywords' => ''];


    public function __construct( $route )
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];

    }


    public function getView()
    {
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }


    public function set($data)
    {
        $this->data = $data;
    }


    public function setData($title = '', $desc = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

}
