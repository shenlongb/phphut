<?php

namespace app\common\model;

use think\Db;
use think\Model;

class DataService extends Model
{

    public function getFind($where)
    {
        if (empty($where)) {
            return null;
        }

        $where['status'] = ['neq',1];
        dump(FeedbackInfo::where($where)->find());
    }

    public function getListAll($where = [])
    {
        if (!isset($where['status'])) {
            $where['status'] [''];
        }
    }

    public function getDel($where)
    {
        if (empty($where)) {
            return 0;
        }

        return $this->where($where)->update(['status' => '-1','mod_time'=>time()]);
    }
}