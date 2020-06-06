<?php

namespace app\widgets\menu;

use amir\Cache;
use amir\App;

class Menu
{
    protected $data; // categories array
    protected $tree; // data tree array
    protected $menuHtml; // finished html
    protected $tpl; // template
    protected $container = 'ul'; // menu tag
    protected $table = 'category';
    protected $cache = 3600; // cache time
    protected $cacheKey = 'w_menu'; //key
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options=[])
    {
        $this->tpl = __DIR__ . "/menu_tpl/menu.php";

        $this->getOptions($options); // rewriting options with user options(if set)

        $this->run();
    }

    protected function getOptions($options)
    {
        /**
         * loops through $options
         * cheks if $k is $this class's property
         * if yes then changes its values to self value
         */
        foreach( $options as $k => $v){
            if (\property_exists($this,$k)) {
                $this -> $k = $v;
            }
        }
    }

    protected function run()
    {
        /***
         * Runs all methods of class
         * 1 - gets data
         * 2 - forms tree
         * 3 - forms html
         */

        /**  ** 1 - gets data
         * getting $menuHtml from cache if exists
         * if $menuHtml is not set in cache getting categories array from cache
         * and collecting it to $data,if $data is empty then selecting
         * categories manually and collecting it in $data
         */
       $cache = Cache::instance();
       $this->menuHtml = $cache->get($this->cacheKey);
       \consoleJson($this->menuHtml);
       if(!$this->menuHtml) {
            $this->data = App::$app->getProperty("`{$this->table}`");
            if (!$this->data) {
                $this->data = \R::getAssoc("SELECT * FROM `{$this->table}`");
            }
            $this->tree = $this->getTree();

            $this->menuHtml = $this->getMenuHtml($this->tree);

            if ($this->cache) {
                $cache->set($this->cacheKey,$this->menuHtml,$this->cache);
            }
        }
        $this->output();
    }




    protected function output()
    {
        echo $this->menuHtml;
    }




    protected function getTree()
    {
        /**  ** 2 - forms tree
         * ** gets all categories as a tree
         * loops through $data
         * if item has no parent, then it is a tree matereial, just copying it to $tree array
         * else collecting it to $data children property
         * returns $tree
         */
        $tree = [];
        $data = $this->data;
        \consoleJson($data);
        foreach($data as $id=>&$node) {

            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['children'][$id] = &$node;
            }

        }
        return $tree;
    }



    public function getMenuHtml($tree, $tab='')
    {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }



    protected function catToTemplate($category, $tab, $id) {
        \ob_start(); // включает буфер кэширования
        require $this->tpl;
        return \ob_get_clean();
    }

}
