<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/23
 * Time: 下午12:04
 */


$data = '{"aa":1}';
$data = '{"aa":1,"bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb":1,"qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq":3}';
$key = '123';

$module=mcrypt_module_open('des', '', MCRYPT_MODE_CBC, '');
$key=substr(md5($key), 0, mcrypt_enc_get_key_size($module));
srand();
$iv=mcrypt_create_iv(mcrypt_enc_get_iv_size($module), MCRYPT_RAND);
mcrypt_generic_init($module, $key, $iv);
$encrypted=$iv.mcrypt_generic($module, $data);
mcrypt_generic_deinit($module);
mcrypt_module_close($module);
return md5($data).'_'.base64_encode($encrypted);
