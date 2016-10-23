<?php

namespace app\admin\model;

use app\common\model\DataService;
use traits\model\SoftDelete;

class BaseNode extends DataService
{
    use SoftDelete;
    protected static $deleteTime = 'delete_time';

}