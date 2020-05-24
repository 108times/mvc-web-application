<?php

use amir\Router;

/*

    default routes
    ^ - beginning
    $ - ending

*/

/*

Router::add(
    1 argument - regular expression,
    2 argument - action for regular expression)
 */

Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

