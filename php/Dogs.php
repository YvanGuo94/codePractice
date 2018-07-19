<?php
/**
 * Created by PhpStorm.
 * User: guoyufeng
 * Date: 2018/4/21
 * Time: 下午11:26
 */
require "FurryPets.php";
class Dogs extends FurryPets
{
    function __construct()
    {
        echo "Dogs" . $this->fourlegs();
        echo $this->makesSound("汪汪");
        echo $this->guardsHouse();
    }
    private function guardsHouse(){
        return "Grrrrr";
    }
}

class Client{
    function __construct()
    {
        $dog = new Dogs();
    }
}

$woek = new Client();