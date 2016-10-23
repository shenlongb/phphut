<?php
namespace app\admin\controller;

use app\admin\model\BaseNode;
use think\Controller;
use think\Model;

class User extends Common
{
    public function index()
    {
        $process = BaseNode::all();
        print_r($process);

        return $this->fetch();
    }

}