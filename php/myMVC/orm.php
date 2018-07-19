<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/18
 * Time: 下午5:17
 */

date_default_timezone_set("Asia/Shanghai");
use Illuminate\Database\Capsule\Manager as Capsule;

date_default_timezone_get();

require __DIR__.'/vendor/autoload.php';

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '192.168.0.130',
    'database'  => 'onehome',
    'username'  => 'username',
    'password'  => 'password',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();