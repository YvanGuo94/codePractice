<?php
/**
 * Created by PhpStorm.
 * User: guoyufeng
 * Date: 2018/7/22
 * Time: 下午5:32
 */

class Boos{

    //领导依赖员工
    private $staff;

    //现在老板只需要接受 hr 招聘就好，将控制权交给 hr
    //以设置方法来实现依赖注入
    public function setStaff(Standard $staff){
        $this->staff = $staff;
    }

    public function task(){
        $this->staff->work();
    }
}

//招聘所设定的标准
interface Standard{
    public function work();
}

//员工需要依赖的标准
class StaffA implements Standard{
    public function work(){
        echo '雇员A有能力能够完成老板指定的工作';
    }
}

class StaffB implements Standard{
    public function work(){
        echo '雇员B有能力能够完成老板指定的工作';
    }
}

//ioc容器
class Hr{
    public function getStagff(){
        return new StaffB();
    }
}

//公司老板
$boos = new Boos();
//老板招的hr
$hr = new Hr();
$staff = $hr->getStagff();
//hr把招到的人给老板（控制反转和依赖注入）
$boos->setStaff($staff);
//老板让他工作了
$boos->task();