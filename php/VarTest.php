<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/24
 * Time: 下午12:02
 */

define('var', 123);

class VarTest
{
//    const constArr = [1];   //Fatal error: Arrays are not allowed in class constants
    const constArr = 1;
    public static $psArr = [1, 2];
    protected static $protectedStaticArr = [1, 2, 3];
    private static $privateStaticArr = [1, 2, 3, 4];
    public $arr = [1, 2, 3, 4, 5];
    const arr = 1;

    public function echoVar()
    {
        var_dump(self::constArr);
        var_dump(self::$psArr);
        var_dump($this->constArr);
        var_dump($this->psArr);
//        var_dump(self::arr);  //Fatal error: Access to undeclared static property: VarTest::$arr
        var_dump($this->arr);
        var_dump(self::arr);
    }

    public static function psfunc()
    {
        var_dump(self::constArr);
//        var_dump($this->arr); //Fatal error: Using $this when not in object context   $this is not accessible in static context
    }
}

var_dump(VarTest::constArr);
var_dump(VarTest::$psArr);
VarTest::$psArr = [];
var_dump(VarTest::$psArr);

$varTest = new VarTest();
$varTest->echoVar();

//the same way
VarTest::psfunc();
$varTest->psfunc();
