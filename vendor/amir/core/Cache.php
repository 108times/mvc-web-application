<?php

namespace amir;

class Cache
{

use TSingletone;


/**
 * Sets $key cache file
 */
public function set($key, $data, $seconds = 3600)
{
if ($seconds) {
    $content['data'] = $data;
    $content['end_time'] = time() + $seconds; // current time + 10 minutes
    if(
        file_put_contents( CACHE . "/" . md5($key) . '.txt',
     serialize($content) ) // hashing and serializing data
     ) {
         return true;
    }
    return false;
}

}

/**
 * Gets $key cache file
 */
public function get($key)
{
    $file = CACHE . "/" . md5($key) . ".txt";
    if (file_exists($file)) {
        $content = unserialize(file_get_contents($file));
        if (time() <= $content['end_time']) {
            // if cache file life time is not over then returning $content
            return $content;
        }
        unlink($file);
    }  // else deleting file and returning false
    return false;
}

public function delete($key)
{
    // deleting cache file if exists
     $file = CACHE . "/" . md5($key) . ".txt";
     if (file_exists($file)) {
         unlink($file);
     }
}

}
