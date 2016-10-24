<?php
namespace app\admin\controller;

use think\Controller;
use think\Model;

class Common extends Controller
{
    public function __construct()
    {
        $this->process();
        parent::__construct();
    }

    public static function process()
    {
        
    }

}