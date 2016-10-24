<?php
namespace app\admin\controller;

use app\admin\model\BaseNode;
use think\Controller;
use think\Db;
use think\Model;

class Admin extends Common
{
    public function index()
    {
        

        return $this->fetch();
    }

}