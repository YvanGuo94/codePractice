<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/19
 * Time: 下午5:07
 */


header("Content-type: text/html; charset=utf-8");

$jsonarr = ["aa"=>1];
$json = json_encode($jsonarr);
//sleep(6);
$json = "alert(1)";
if (!empty($_GET['callback'])) {
    echo $_GET['callback'] . '(' . $json . ')'; // jsonp
}