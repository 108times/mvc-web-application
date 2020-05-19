<?php

namespace app\controllers;

use amir\base\Controller;
use amir\base\Model;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
    }
}
