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
        $names = ['Amir','Jane'];
        $cache = Cache::instance();
        // $cache->set('test2',$names);

        $cache->delete('test2');
        // $data = $cache->get('test2');
        // if (!$data) {
        //     $cache->set('test2',$names);
        // }
        debug($data);
        $this->setData('Главная страница', 'Описание...', 'Ключевые слова');
        $this->set(compact('name','age','databaseData'));
    }

}
