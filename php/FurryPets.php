<?php
/**
 * Created by PhpStorm.
 * User: guoyufeng
 * Date: 2018/4/21
 * Time: 下午11:22
 */

class FurryPets
{
    protected $sound;
    protected function fourlegs()
    {
        return "walk on all fours";
    }
    protected function makesSound($petNoise)
    {
        $this->sound=$petNoise;
        return $this->sound;
    }
}
