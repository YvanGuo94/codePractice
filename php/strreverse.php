<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/6
 * Time: 上午10:45
 */

function str_rev_gb($str)
{
    //判断输入的是不是utf8类型的字符，否则退出
    if (!is_string($str)||!mb_check_encoding($str, 'UTF-8')) {
        exit("输入类型不是UTF8类型的字符串");
    }
    $array=array();
    //将字符串存入数组
    $l=mb_strlen($str, 'UTF-8');
    for ($i=0;$i<$l;$i++) {
        $array[]=mb_substr($str, $i, 1, 'UTF-8');
    }
    //反转字符串
    krsort($array);
    //拼接字符串
    $string=implode($array);
    return $string;
}
$str1 = "Englist";
$str2 = "English中国";
$str3 = "Eng中lish国";
$str4 = "中华人民共和国";

echo $str1."->".str_rev_gb($str1)."<br>";
echo $str2."->".str_rev_gb($str2)."<br>";
echo $str3."->".str_rev_gb($str3)."<br>";
echo $str4."->".str_rev_gb($str4)."<br>";


function reverse($arr)
{
    $n = count($arr);

    $left = 0;
    $right = $n - 1;

    while ($left < $right) {
        $temp = $arr[$left];
        $arr[$left++] = $arr[$right];
        $arr[$right--] = $temp;
    }

    return $arr;
}
$aa = [6,2,7,3,8,9];
print_r(reverse($aa));
$str4 = "11中华人民共和国111eqwer";
function mb_str_split($str)
{
    return preg_split('/(?<!^)(?!$)/u', $str);
}
print_r(reverse(mb_str_split($str4)));
