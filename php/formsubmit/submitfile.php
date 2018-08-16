<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/8/1
 * Time: 下午2:37
 */

$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';

$allow_origin = array(
    'http://localhost:63342',
    'http://client2.runoob.com'
);

if (in_array($origin, $allow_origin)) {
    header('Access-Control-Allow-Origin:' . $origin);
}
//var_dump($_FILES);
move_uploaded_file($_FILES['file']['tmp_name'], __DIR__.'/'.$_FILES['file']['name']);

echo 1;
