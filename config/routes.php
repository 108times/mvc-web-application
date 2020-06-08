<?php

use amir\Router;

/*
    default routes
    ^ - beginning
    $ - ending

Router::add(
    1 argument - regular expression,
    2 argument - action for regular expression)
 */

/**
 * [a-z-] letters and "-" sign
 * (?P<name>regex) - Round brackets group the regex between them. They capture the text matched by the regex inside them
 * that can be referenced by the name between the sharp brackets. The name may consist of letters and digits.
 */

Router::add('^product/(?P<alias>[a-z0-9-]+)/?$',['controller' => 'Product', 'action' => 'view']);


/**
 *  default routes ( common rules )
 */
Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

