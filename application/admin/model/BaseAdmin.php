<?php

namespace app\admin\model;

use app\common\model\DataService;
use traits\model\SoftDelete;

class BaseAdmin extends DataService
{
    use SoftDelete;
    protected static $deleteTime = 'delete_time';

//    protected static function base($query)
//    {
//        $query->where('status','neq', '-1');
//    }

    public function loginCheck($userName, $passWord)
    {
        $where = [
            'user' => $userName,
            'password' => md5($passWord),
        ];
        $info = $this->where($where)->field('admin_id,status')->find();
        if (!empty($info)) {
            return '用户不存在';
        } elseif ($info['status'] < 0) {
            return '用户不存在或已删除';
        }

        return $info['admin_id'];
    }

    public function process($admin_id)
    {
        $where = [
            'admin_id' => $admin_id,
        ];
        $info = $this
                    ->where($where)
                    ->field('admin_id,type,status')
                    ->find();

        if (!empty($info)) {
            return '用户不存在';
        } elseif ($info['status'] < 0) {
            return '用户不存在或已删除';
        }

        if ($info['type'] == 2) {
            $process = model('BaseNode')->getListAll();
        } elseif ($info['type'] == 1) {

        } else {
            return '权限不足';
        }

        return true;
    }
}