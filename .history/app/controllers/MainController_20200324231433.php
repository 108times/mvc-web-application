<?php

namespace app\controllers;


class MainController extends AppController
{


    public function indexAction()
    {
        $databaseData = \R::findAll('test');
        $name = 'Amir';
        $age = '20';
        $this->setData('Главная страница', 'Описание...', 'Ключевые слова');
        $this->set(compact('name','age'));
    }

}
