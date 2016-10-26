<?php
namespace app\admin\controller;

use app\admin\model\BaseAdmin;
use think\Controller;
use think\Db;

class Index extends Common
{
    public function index()
    {

    }

    public function login()
    {

        // dump(BaseAdmin::all(1));
        $baseAdmin = new BaseAdmin();
        $baseAdmin->save(['name' => '管理员-2'], ['admin_id' => 1]);

        $this->assign('check', url('index/check'));
        return $this->fetch();
    }

    public function check()
    {
        $username = input('post.username');
        $userpass = input('post.userpass');
        $captcha = input('post.usercap');

        $data = [];
        if(!captcha_check($captcha, 1)){
            $data = ['code' => 1, 'msg' => '验证码错误'];
        };

        $admin_id = model('BaseAdmin')->loginCheck($username, $userpass);
        if (0 > $admin_id) {
            $data = ['code' => 1, 'msg' => lang('adminError'.$admin_id)];
        }

        if (empty($data)) {
            $url = url('feedback/feedback');
            $data = ['code' => 0, 'msg' => '', 'url' => $url];
        }
        return json($data);


    }
}
