<?php

namespace app\controllers;


class MainController extends AppController
{


    public function indexAction()
    {
        $databaseData = \R::findAll('test');
        $post = \R::find('user', 'id = ?', array(2));
        $name = 'Amir';
        $age = '20';
        $this->setData('Главная страница', 'Описание...', 'Ключевые слова');
        $this->set(compact('name','age','databaseData'));
    }

}
