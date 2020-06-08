<?php

namespace app\controllers;

class BlogController extends AppController
{

public function indexAction()
{

    $blog = \R::find('blog',"`status`='1' ORDER BY `sort`");
    $this->set(\compact('blog'));
}

}

?>
