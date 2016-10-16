<?php
namespace app\admin\controller;

use think\Model;

class Feedback extends Common
{
    public function feedback()
    {
        $step    = input('request.step');
        $page    = input('request.page');
        $key     = input('request.key');
        $groupid = input('request.groupid');

        return $this->fetch();
    }

    /**
     * delall
     * User: longbiao.shen
     * 批量删除
     */
    public function delall()
    {
        $dall = input('get.dall/a');
        if (!empty($dall)) {
            $arr = implode(',', $dall);
            model('FeedbackInfo')->getDel(['id' => ['in', $arr]]);
        }
        $this->redirect('Feedback/feedback');

    }
}