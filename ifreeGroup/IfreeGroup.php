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

    /**
     * 生成随机字符串
     * @param string $length
     * @return string
     * @author su@ifreegroup.com
     * @date 2019/7/24  10:41
     */
    public static function createRandomStr(string $length):string
    {
        $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; //52个字符
        $strlen = 52;
        while ($length > $strlen) {
            $str .= $str;
            $strlen += 52;
        }
        $str = str_shuffle($str);
        return substr($str, 0, $length);
    }
}