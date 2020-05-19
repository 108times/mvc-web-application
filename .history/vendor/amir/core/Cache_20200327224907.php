<?php

namespace amir;

class Cache
{

use TSingletone;

public function set($key, $data, $seconds = 3600)
{

if ($seconds) {
    $content['data'] = $data;

}

}

public function get()
{

}

public function delete()
{

}
}
