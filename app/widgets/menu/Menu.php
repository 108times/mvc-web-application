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
    protected $class = '';
    protected $mainClass = 'main-menu';
    protected $table = 'category';
    protected $cache = 3600; // cache time
    protected $cacheKey = 'w_menu'; //key
    protected $tableLinks = 0;
    protected $attrs = [];
    protected $parent_index = 'parent_id';
    protected $prepend = '';
    protected $mainMenu = 0;
    protected $subMenu = 0;
    protected $useExtraScript = 0;

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

       if(!$this->menuHtml) {
            $this->data = App::$app->getProperty("`{$this->table}`");
            if (!$this->data) {
                $this->data = \R::getAssoc("SELECT * FROM `{$this->table}`");
            }
            $this->tree = $this->getTree();
            \consoleJson($this->tree);

            $this->menuHtml = $this->getMenuHtml($this->tree);

            if ($this->cache) {
                $cache->set($this->cacheKey,$this->menuHtml,$this->cache);
            }
        }

      $this->output();
    }




    protected function output()
    {
        ob_start();
        $attrs = '';
        if (!empty($this->attrs)){
        foreach ($this->attrs as $k=>$v) {
            $attrs .= " $k='$v' ";
        }
        }

        echo "<$this->container class='$this->class $this->mainClass' $attrs>";

        echo $this->prepend;

        echo $this->menuHtml;

        if ($this->mainMenu) {
        new \app\widgets\currency\Currency($this->mainClass . "__item");
        echo '<li class="nav-item cta cta-colored jsFixExtension ' . $this->mainClass . "__item" . '"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>';
        }

        echo "</$this->container>";

        echo \ob_get_clean() ;

        $this->jsFix($this->mainClass);
        if ($this->useExtraScript) {
            $this->jsFix2($this->useExtraScript);
        }

    }

    protected function jsFix($mainClass)
    {
        echo "<script> menu['$mainClass'] = '$mainClass';</script>";
    }
    protected function jsFix2($index)
    {
        echo "<script> submenu['$index'] = '$index';</script>";
    }

    protected function getTree($parent_index='parent_id')
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

        foreach($data as $id=>&$node) {

            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['children'][$id] = &$node;
            }

        }
        return $tree;
    }



    public function getMenuHtml($tree, $tab='',$usecustomtpl=false,$newtpl='',$customid='')
    {
        \console('dEBUGGING tREE');
        \consoleJson($tree);
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->catToTemplate($category, $tab, $id, $usecustomtpl,$newtpl,$customid);
        }
        if ($usecustomtpl) {
            $this->useExtraScript = $usecustomtpl;
        }
        return $str;

    }



    protected function catToTemplate($category, $tab, $id,$usecustomtpl,$newtpl,$customid) {
        \ob_start(); // включает буфер кэширования
        $tpl = $usecustomtpl ? $newtpl : $this->tpl;
        $identifier = 'dropdown-'.$customid."__item";
        // alert('id='.$id.', category='.$category['title'].'.newtpl =' .$newtpl.",usecustomtpl=" . $usecustomtpl . ', customid='.$customid);
        require $tpl;
        return \ob_get_clean();
    }

}
