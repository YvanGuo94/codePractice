<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/20
 * Time: 下午2:27
 */


function aa($a){

    $a++;
    bb(123);
}

function bb($b){
    $cc = new cc();
    $cc->dd();
}

class cc{
    private $a = 1;

    function dd(){
        print_r(debug_backtrace());
    }
}

aa(111);


