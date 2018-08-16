<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/8/6
 * Time: 上午10:15
 */
date_default_timezone_set('Asia/Shanghai');

$datetime1 = new DateTime('20180312');
$datetime2 = new DateTime('20190303');
$interval = $datetime1->diff($datetime2);
//echo $interval->days;
echo $interval->format('%R%a days');
