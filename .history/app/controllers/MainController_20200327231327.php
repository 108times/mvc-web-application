<?php

namespace app\controllers;

use amir\Cache;

class MainController extends AppController
{


    public function indexAction()
    {
        $databaseData = \R::findAll('test');
        $post = \R::find('test', 'id = ?', [2]);
        $name = 'Amir';
        $age = '20';

        $cache = Cache::instance();
        $cache->set('test',$name);
        $this->setData('Главная страница', 'Описание...', 'Ключевые слова');
        $this->set(compact('name','age','databaseData'));
    }

}
