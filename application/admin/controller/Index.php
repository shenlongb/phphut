<?php
namespace app\admin\controller;

class Index extends Common
{
    public function index()
    {

    }

    public function login()
    {
        $this->assign('check', url('index/check'));
        return $this->fetch();
    }

    public function check()
    {
        $username = input('post.username');
        $userpass = input('post.userpass');
        $captcha = input('post.cap');

        $data = [];
        if(!captcha_check($captcha, 1)){
            return json(['code' => 1, 'msg' => '验证码错误']);
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
