<?php

namespace app\models;

use amir\base\Model;
use amir\base\Controller;
class AppModel extends Model
{

public function __construct($route)
{

    parent::__construct($route);
    new AppModel();

}


}
