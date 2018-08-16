<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/25
 * Time: 上午11:01
 */

header('X-Accel-Buffering: no');


for ($i=0;$i<=10;$i++) {
    echo $i;
    ob_flush();
    flush();
    sleep(1);
}
