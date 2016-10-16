<?php
namespace app\admin\controller;

use think\Controller;
use think\Model;
use app\common\model\DataService;
use think\Request;
use think\response\Redirect;

class Feedback extends Controller
{
    public function feedback()
    {
        $step    = input('request.step');
        $page    = input('request.page');
        $key     = input('request.key');
        $groupid = input('request.groupid');
        dump(Request::instance());
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