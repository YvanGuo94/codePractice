<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/14
 * Time: 下午3:51
 */

function qs(&$arr)
{
    $high = count($arr)-1;
    realqs($arr,0,$high);

}

function realqs(&$arr, $low, $high)
{
    if ($low<$high){
        $temptag = find($arr,$low,$high);
        realqs($arr,$temptag+1,$high);
        realqs($arr,$low,$temptag-1);
    }
}

function find(&$arr, $low, $high)
{
    $tag = $arr[$low];
    while ($low<$high){
        while ($low<$high && $arr[$high] >= $tag){
            $high--;
        }
        swap($arr,$low,$high);
        while ($low<$high&& $arr[$low] <= $tag){
            $low ++;
        }
        swap($arr,$low,$high);
    }
    return $low;
}

function swap(array &$arr,$a,$b){
    $temp = $arr[$b];
    $arr[$b] = $arr[$a];
    $arr[$a] = $temp;
}

$arr = [6,2,7,3,8,9];
qs($arr);
print_r($arr);


function binSearch($arr, $target){
    $height = count($arr)-1;
    $low = 0;

    while($low <= $height){
        $mid = floor(($low+$height)/2);//获取中间数

        //两值相等，返回
        if($arr[$mid] == $target){
            return $mid;

            //元素比目标大，查找左部
        } elseif ($arr[$mid] < $target){
            $low = $mid + 1;

            //元素比目标小，查找右部
        } elseif ($arr[$mid] > $target){
            $height = $mid - 1;
        }
    }
    return "查找失败";
}

