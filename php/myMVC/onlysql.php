<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/19
 * Time: 下午7:39
 */

require "orm.php";
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;

$student=Capsule::select("select * from house WHERE id=?",[23055022]);
print_r($student);