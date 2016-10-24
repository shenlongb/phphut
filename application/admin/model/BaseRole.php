<?php

namespace app\admin\model;

use app\common\model\DataService;
use traits\model\SoftDelete;

class BaseRole extends DataService
{
    use SoftDelete;
    protected static $deleteTime = 'delete_time';

    public function adminProcess($admin_id)
    {
        if (empty($admin_id) || !is_numeric($admin_id)) {
            return [];
        }

        $info = $this
            ->where(['admin_id' => $admin_id])
            ->field('admin_id,type,status')
            ->find();

        // 获取用户所在角色
        
    }


}