<?php

namespace amir;

class Cache
{

use TSingletone;

public function set($key, $data, $seconds = 3600)
{

if ($seconds) {
    $content['data'] = $data;
    $contnet['end_time'] = time() + $seconds;
}

}

public function get()
{

}

public function delete()
{

}
}
