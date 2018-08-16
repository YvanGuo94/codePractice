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

foreach ($tagetArr as $i => $v) {
    $k[] = array_search($v['id'], $order_by_field);
}
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

function orderByColumn(array &$arr, $key)
{
    array_multisort(array_column($arr, $key), $arr);
}

orderByColumn($tagetArr2, 'id');


$tagetArr = [
    0 => [
        'userId' => '11',
        'other' => 'aaa'
    ],
    1 => [
        'userId' => '11',
        'other' => 'bbb'
    ],
    2 => [
        'userId' => '33',
        'other' => 'ccc'
    ],
    3 => [
        'userId' => '44',
        'other' => 'ccc'
    ]
];
$userId = array_column($tagetArr, 'userId');

$tagetArr2 = [
    0 => [
        'userId' => '11',
        'otherKey' => 2222
    ],
    1 => [
        'userId' => '33',
        'otherKey' => 2222
    ],
    2 => [
        'userId' => '44',
        'otherKey' => 3333
    ]
];

/*
     * 按照$tagetArr排序.$tagetArr2与$tagetArr逻辑上为n:1或1:1.$tagetArr2行数小于等于$tagetArr
     *
     */
function myInnerJoin($tagetArr2, $key2, $tagetArr, $key)
{
    $reultArr = [];
    $arr = array_column($tagetArr2, $key2);
    foreach ($tagetArr as $tagetIndex => $tagetItem) {
        $orderIndex = array_search($tagetItem[$key], $arr);
        if ($orderIndex !== false) {
            $reultArr[] = array_merge($tagetArr[$tagetIndex], $tagetArr2[$orderIndex]);
        }
    }
    return $reultArr;
}

print_r(myInnerJoin($tagetArr2, 'userId', $tagetArr, 'userId'));
