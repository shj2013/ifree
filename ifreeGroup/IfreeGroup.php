<?php
/**
 * Created by PhpStorm.
 * User: ifree
 * Date: 2019/7/23
 * Time: 19:40
 */

namespace ifreeGroup;


class IfreeGroup
{
    /**
     * 定义API 统一输出
     * @param string|NULL $msg
     * @param string|NULL $code
     * @param array $data
     * @return string
     * @author su@ifreegroup.com
     * @date 2019/7/24  10:10
     */
    public static function json(string $msg = NULL,string $code =NULL, array $data =[]):string{
        $backData = [
            'msg'=>$msg,
            'code'=>$code,
            'data'=>$data
        ];
        return json_encode($backData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}