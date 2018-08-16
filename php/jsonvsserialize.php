<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/23
 * Time: 下午5:10
 */
$t1 = microtime(true);

$arr = ["a"=>1,"b"=>2,"v"=>3];

for ($i=0;$i<=100000;$i++) {
    json_encode($arr);
}
$t2 = microtime(true);
echo '耗时'.round($t2-$t1, 3)."秒\n";

$t1 = microtime(true);

$arr = ["a"=>1,"b"=>2,"v"=>3];

for ($i=0;$i<=100000;$i++) {
    serialize($arr);
}
$t2 = microtime(true);

echo '耗时'.round($t2-$t1, 3)."秒\n";
