<?php

namespace app\admin\model;

use app\common\model\DataService;
use think\Db;
use traits\model\SoftDelete;

class BaseAdmin extends DataService
{
    use SoftDelete;
    protected static $deleteTime = 'delete_time';


    public function loginCheck($userName, $passWord)
    {
        $where = [
            'user' => $userName,
            'password' => md5($passWord),
        ];
        $info = $this->withTrashed()->where($where)->field('admin_id,status,delete_time,type')->find();

        if (empty($info)) {
            return -1;
        } elseif ($info['delete_time'] != 0) {
            return -2;
        } elseif ($info['status'] == 1) {
            return -3;
        }

        

        // 登陆成功 权限处理
        $this->process($info);

        return $info['admin_id'];
    }

    private static function process($info)
    {
        $admin_id = $info['admin_id'];

        if ($info['type'] == 2) {
            $process = Db::name('BaseNode')->order(['level'=>'asc','sort'=>'asc'])->where(['status'=>0, 'delete_time'=>0])->select();
        } elseif ($info['type'] == 1) {
            $prefix = config('database.prefix');
            // 获取用户分组
            $process = Db::table($prefix.'base_role_admin')
                        ->alias('ra')
                        ->join([
                            [$prefix.'base_role r', 'r.role_id = ra.role_id', 'left'],
                            [$prefix.'base_access a', 'r.role_id = a.role_id', 'left'],
                            [$prefix.'base_node n', 'n.node_id = a.node_id and n.delete_time = 0 and n.status = 0', 'left'],
                        ])
                        ->where(['ra.admin_id' => 2])
                        ->field('r.name r_name, n.*')
                        ->order(['level'=>'asc','sort'=>'asc'])
                        ->select();

        } else {
            return -4;
        }

        if (empty($process)) {
            return -4;
        }

        $processArr = [];
        $process = getKeyArray($process, 'node_id');
        dump($process);
        die();
        foreach ($process as $k => $v) {
            if ($v['level'] == 0) {

            } elseif ($v['level'] == 1) {

            } elseif ($v['level'] == 2) {

            }
        }

        return true;
    }
}