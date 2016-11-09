<?php

namespace app\admin\model;

use app\common\model\DataService;
use think\Db;
use think\Session;
use traits\model\SoftDelete;

class BaseAdmin extends DataService
{
    use SoftDelete;
    protected static $deleteTime = 'delete_time';


    public function loginCheck($userName, $passWord)
    {
        $where = [
            'user' => $userName,
        ];
        $info = $this->withTrashed()->where($where)->find();

        if (empty($info)) {
            return -1;
        } elseif ($info['delete_time'] != 0) {
            return -2;
        } elseif ($info['status'] == 1) {
            return -3;
        } elseif ($info['password'] != md5($passWord)) {
            return -4;
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
            return -5;
        }

        if (empty($process)) {
            return -5;
        }

        $processArr = [];
        $process = getKeyArray($process, 'node_id');

        foreach ($process as $k => $v) {
            if ($v['level'] == 1) {
                $processArr[$v['node_id']]['title'] = $v['title'];
            } elseif ($v['level'] == 2) {
                $node_id = $process[$v['pid']]['node_id'];
                $arr = ['title'=>$v['title'], 'url'=> url($process[$node_id]['name'].'/'.$v['name'].'/list')];
                $processArr[$node_id]['list'][$v['node_id']] = $arr;
            } elseif ($v['level'] == 3) {
                $topPid = $process[$v['pid']]['pid'];
                $node_id = $process[$topPid]['node_id'];
                $pid_node_id = $process[$v['pid']]['node_id'];

                $arr = ['title'=>$v['title'], 'url'=> url($process[$node_id]['name'].'/'.$process[$pid_node_id]['name'].'/'.$v['name'])];
                $processArr[$node_id]['list'][$pid_node_id]['node'][] = $arr;
            }

            $info['r_name'] = $v['r_name'];
        }

        if (empty($processArr)) {
            return -5;
        }

        $name = config('admin.admin_node');
        Session::set($name, $processArr);

        $name = config('admin.admin');
        $session = [
            'admin_id'   => $info['admin_id'],
            'name'       => $info['name'],
            'token'      => '',
            'r_name'     => $info['r_name'],
            'type'       => $info['type'],
            'login_time' => time(),
        ];
        Session::set($name,$session);

        return true;
    }
}