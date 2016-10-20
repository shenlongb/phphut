<?php
namespace app\admin\controller;

use think\Controller;
use think\Model;

class User extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

}