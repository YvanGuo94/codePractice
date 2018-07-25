<?php
/**
 * Created by PhpStorm.
 * User: guoyufeng
 * Date: 2018/7/22
 * Time: 下午5:32
 */

class Boos
{

    //领导依赖员工
    private $staff;

    public function setStaff()
    {
        //来应聘的员工A
        $staff = new StaffA();
        //老板判断是否满足技能
        if ($staff instanceof Standard) {
            $this->staff = $staff;
        } else {
            throw new Exception('该员工没有我需要的工作能力');
        }
    }

    public function task()
    {
        $this->staff->work();
    }
}

//招聘所设定的标准
interface Standard
{
    public function work();
}

//员工需要依赖的标准
class StaffA implements Standard
{
    public function work()
    {
        echo '雇员A有能力能够完成老板指定的工作';
    }
}

class StaffB implements Standard
{
    public function work()
    {
        echo '雇员B有能力能够完成老板指定的工作';
    }
}
