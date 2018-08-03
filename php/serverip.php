<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/31
 * Time: 上午9:53
 */

function getLocalIP()
{
    $preg = "/\A((([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\.){3}(([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\Z/";
//获取操作系统为win2000/xp、win7的本机IP真实地址
//    exec("ipconfig", $out, $stats);
//    if (!empty($out)) {
//        foreach ($out AS $row) {
//            if (strstr($row, "IP") && strstr($row, ":") && !strstr($row, "IPv6")) {
//                $tmpIp = explode(":", $row);
//                if (preg_match($preg, trim($tmpIp[1]))) {
//                    return trim($tmpIp[1]);
//                }
//            }
//        }
//    }
//获取操作系统为linux类型的本机IP真实地址
    $match = '';
    exec("ifconfig", $result, $stats);
//    var_dump($stats);
    $result = implode("", $result);
    $is_match = preg_match_all("/addr:(\d+\.\d+\.\d+\.\d+)/", $result, $match);

    if ($is_match == 0) {
        $is_match = preg_match_all("/inet (\d+\.\d+\.\d+\.\d+)/", $result, $match);
    }

    if ($is_match !== 0) {
        foreach ($match [0] as $k => $v) {
            if ($match [1] [$k] != "127.0.0.1") {
                $the_local_ip = $match [1] [$k];
                return $match [1] [$k];
            }
        }
    }
    return '127.0.0.1';
}

//echo PHP_OS;
//echo php_uname('s');
echo php_uname('n')."\n";
echo exec('whoami');
//echo getLocalIP();
//var_dump($_SERVER['SERVER_ADDR']);
