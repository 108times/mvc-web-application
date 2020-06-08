<?php

namespace app\controllers;


class AboutController extends AppController
{

public function indexAction()
{
    $features = \R::find('features',"ORDER BY `sort` ASC LIMIT 5");

    $this->set(\compact('features'));
}

}
