<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


/**
 * getArray
 * 得到一个数组，如果不是数组，返回数组
 *
 * @param mixed $array
 * @static
 * @access public
 * @return void
 */
function getArray($array)
{
    if(!is_array($array)){
        return (array)$array;
    }
    return $array;
}

/**
 * getKeyArray
 * 根据key，生成新的array
 *
 * @param mixed $array
 * @param mixed $key
 * @static
 * @access public
 * @return void
 */
function getKeyArray($array,$key)
{
    $retArr = array();
    $array = getArray($array);
    foreach ($array as $k => $v) {
        if (isset($v[$key])) {
            $retArr[$v[$key]] = $v;
        }
    }
    return $retArr;
}