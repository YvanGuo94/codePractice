<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/18
 * Time: 下午4:23
 */

require __DIR__."/phpqrcode/phpqrcode.php";

$t1 = microtime(true);


for ($i=0;$i<=1000;$i++) {
    ob_start();
    QRcode::png("https://www.onehome.me/");
    ob_end_clean();
}

$t2 = microtime(true);

header("Content-type: application/json; charset=utf-8");
echo '耗时'.round($t2-$t1, 3).'秒';
