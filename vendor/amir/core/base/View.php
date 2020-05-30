<?php

namespace amir\base;

class View
{
    public $route;
    public $prefix;

    public $controller;
    public $model;
    public $view;
    public $layout;

    public $data = [];
    public $meta = [];

    public function __construct( $route, $layout = '', $view = '', $meta )
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $view;
        $this->model = $route['controller'];
        $this->prefix = $route['prefix'];
        $this->meta = $meta;

        if ($layout === false){
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
    }

    public function render($data)
    {
        if (is_array($data)) {
            extract($data); // array values to global variables
        }

        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";

        if (is_file($viewFile)){
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();

        } else {
            throw new \Exception("Не найден вид {$viewFile}",500);
         }
         if ( false !== $this -> layout) {
          $layoutFile = APP . "/views/layouts/{$this->layout}.php";
          if (is_file( $layoutFile ) ) {
              require_once $layoutFile;
          } else {
              throw new \Exception("Не найден шаблон {$this->layout}", 500);
          }
         }

    }

    public function getMeta()
    {
        $meta = $this->meta;
        $out = "";
        $keywords = "";
        $counter = 1;
        if (isset($meta['title']) && $meta['title'] !== '') {
            $out .= "<title>{$meta['title']}</title>" . PHP_EOL;
        }
        if (isset($meta['keywords']) && $meta['keywords'] !== '') {
           if (is_array($meta['keywords'])) {
               foreach ($meta['keywords'] as $key => $value) {
                   if ($counter === sizeof($meta['keywords'])) {
                       $keywords .= $value;
                   } else {
                       $keywords .= $value . ", ";
                   }
                   $counter++;
               }
           } else if (is_string($meta['keywords'])) {
               $keywords = $meta['keywords'];
           }
            $out .= "<meta name='keywords' content='{$keywords}'>" . PHP_EOL;
        }
        if (isset($meta['desc']) && $meta['desc'] !== '') {
            $out .= "<meta name='description' content='{$meta['desc']}'>";
        }

        return $out;

    }


}
