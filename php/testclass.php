<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/10
 * Time: 上午11:16
 */

class Foo{
    protected $b = 2;
    public $a = 44;
    public static $c = 1;
}
class Foo2 extends Foo{
    public function cc(){
        echo self::$c;
        echo $this->b;
    }
}
$foo = new Foo();
$foo->a = 1;

print_r($foo);
$foo2 = new Foo2();
$foo2->cc();
print_r($foo2);
echo Foo::$c;
var_dump($foo->c);

$stdobj = new stdClass();
$stdobj->aa = '11';
print_r($stdobj);