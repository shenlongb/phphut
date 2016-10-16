<?php
namespace app\admin\controller;

use think\Controller;
use think\Model;

class Common extends Controller
{
    public function __construct()
    {
        if (!$this->checkLogin()) {
            $this->redirect('Index/login');
        }
        parent::__construct();
    }

    public function checkLogin()
    {
        return false;
    }

}