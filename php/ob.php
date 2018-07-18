<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/10
 * Time: 上午10:49
 */

$message_array = ["aa"=>"bb",["cc"=>"dd"]];
ob_start();
print_r ($message_array);
$message_string = ob_get_contents();
ob_end_clean();
$fp = fopen(__DIR__.DIRECTORY_SEPARATOR.'obtest.log',"w+");
fwrite($fp, $message_string);
fclose($fp);