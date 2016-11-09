<?php
namespace app\admin\controller;

use think\Controller;
use think\Session;

class Common extends Controller
{
    protected $admin_info = array();

    public function __construct()
    {
        $this->process();
        parent::__construct();
    }

    protected function process()
    {
        $name = config('admin.admin');
        $session = Session::get($name);
        if (!empty($session)) {
            $this->admin_info = $session;
        }
    }

}