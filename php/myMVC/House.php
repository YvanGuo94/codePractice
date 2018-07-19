<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/19
 * Time: 下午6:47
 */

require "orm.php";

class House extends Illuminate\Database\Eloquent\Model {
    protected $table = 'house';
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    protected $dateFormat = 'U';

}

$houses = House::where('id', '=', 23054929)->get();

//print_r($houses);

$h1 = new House();

$h1->title='addfromEloquent';

if($h1->save()){
    echo $h1->id;
}else{
    echo '添加失败！';
}