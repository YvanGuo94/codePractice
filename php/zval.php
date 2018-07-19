<?php
/**
 * Created by PhpStorm.
 * User: guoyufeng
 * Date: 2018/7/7
 * Time: 下午5:55
 */

$a = 1;
xdebug_debug_zval('a');

$b = $a;
xdebug_debug_zval('a');
xdebug_debug_zval('b');
$b = &$a;
xdebug_debug_zval('a');
xdebug_debug_zval('b');
$c = '123';
xdebug_debug_zval('c');
$d = [0,1,2];
xdebug_debug_zval('d');