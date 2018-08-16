<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/19
 * Time: 下午6:47
 */

require "orm.php";

var_dump($capsule);


class House extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'house';
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    protected $dateFormat = 'U';

    public function belongsToUser()
    {
        return $this->belongsTo('User', 'userId', 'id');
    }
}

class User extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'user';
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    protected $dateFormat = 'U';
}

$myhouse = House::where('pricePerNight', '>', 100)
    ->limit(2)
    ->with('belongsToUser')
    ->get();
var_dump($myhouse);

//$h1 = new House();
//
//$h1->title='addfromEloquent';
//
//if($h1->save()){
//    echo $h1->id;
//}else{
//    echo '添加失败！';
//}
