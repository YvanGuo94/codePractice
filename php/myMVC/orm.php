<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/18
 * Time: 下午5:17
 */

date_default_timezone_set("Asia/Shanghai");

require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;


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

class House extends Illuminate\Database\Eloquent\Model {
    protected $table = 'house';
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    protected $dateFormat = 'U';

    public function belongsToUser()

    {
        return $this->belongsTo('User', 'userId', 'id');
    }

}

class User extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'user';
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    protected $dateFormat = 'U';

}
$capsule::connection()->enableQueryLog();


$myhouse = House::where('id','=' ,20150867)
    ->with('belongsToUser')
    ->limit(1)
    ->get();
var_dump($myhouse);
$log = $capsule::getQueryLog();

var_dump($log);