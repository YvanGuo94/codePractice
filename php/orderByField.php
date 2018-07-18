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
print_r($tagetArr);
foreach ($tagetArr as $i => $v) $k[] = array_search($v['id'], $order_by_field);
array_multisort($k, $tagetArr);
print_r($tagetArr);