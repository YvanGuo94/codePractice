<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/4/23
 * Time: 下午3:13
 */

$order_by_field = ['123', '222', '321'];
$tagetArr = [
    0 => [
        'id' => '222',
        'otherKey' => 1111111
    ],
    1 => [
        'id' => '123',
        'otherKey' => 2222
    ],
    2 => [
        'id' => '321',
        'otherKey' => 3333
    ]
];

foreach ($tagetArr as $i => $v) $k[] = array_search($v['id'], $order_by_field);
array_multisort($k, $tagetArr);
//print_r($tagetArr);

$tagetArr2 = [
    0 => [
        'id' => '2',
        'otherKey' => 1111111
    ],
    1 => [
        'id' => '1',
        'otherKey' => 227345522
    ],
    2 => [
        'id' => '3',
        'otherKey' => 523423
    ],
    3 => [
        'id' => '5',
        'otherKey' => 333655
    ],
    4 => [
        'id' => '4',
        'otherKey' => 123123
    ]
];

function orderByColumn(array &$arr, $key){
    array_multisort(array_column($arr,$key), $arr);
}

orderByColumn($tagetArr2,'id');
