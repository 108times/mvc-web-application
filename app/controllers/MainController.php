<?php

namespace app\controllers;

use amir\Cache;

class MainController extends AppController
{

    public function indexAction()
    {
        $this->setData('Главная страница', 'Описание...', 'Ключевые слова');

    }

}
