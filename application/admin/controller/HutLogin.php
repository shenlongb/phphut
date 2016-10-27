<?php
namespace app\admin\controller;

class HutLogin extends Common
{
    public function __construct()
    {

        $this->process();
        // 登陆信息判断
        if (!$this->checkLogin()) {
            $this->redirect('Index/login');
        }

        // 权限判断
        if (!$this->checkAccess()) {
            // $this->redirect('Index/login');
        }

        parent::__construct();
    }

    /**
     * 指定访问控制规则。
     * 这个方法是通过“访问控制”使用的过滤器。
     * 返回数组访问控制规则
     */
    public function accessRules(){ }

    /**
     * 用户登陆状态判断
     * 
     */
    public function checkLogin()
    {
        dump($this->admin_info);
die();
        return false;
    }

    public function checkAccess()
    {
        $accessRules = $this->accessRules();
        $getAction   = request()->action();

        if (isset($accessRules['allow']) && in_array($getAction, $accessRules['allow'])) {
            return true;
        }

        if (isset($accessRules['deny']) && in_array($getAction, $accessRules['deny'])) {
            return false;
        }

    }

}