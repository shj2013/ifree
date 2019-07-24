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
    public static function json(string $msg = NULL, string $code = NULL, array $data = []): string
    {
        $backData = [
            'msg' => $msg,
            'code' => $code,
            'data' => $data
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
    public static function createRandomStr(string $length): string
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

    /**
     * @param string $email
     * @return bool
     * @author su@ifreegroup.com
     * @date 2019/7/24  10:57
     */
    public static function emailPattern(string $email): bool
    {
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if (preg_match($pattern, $email)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 获取客户端的真实IP 地址
     * @return string
     * @author su@ifreegroup.com
     * @date 2019/7/24  11:02
     */
    public static function getIPaddress(): string
    {
        $IPaddress = '';
        if (isset($_SERVER)) {

            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {

                $IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {

                $IPaddress = $_SERVER["HTTP_CLIENT_IP"];
            } else {

                $IPaddress = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR")) {

                $IPaddress = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {

                $IPaddress = getenv("HTTP_CLIENT_IP");
            } else {

                $IPaddress = getenv("REMOTE_ADDR");
            }
        }
        return $IPaddress;
    }

    /**
     * @param string $url
     * @param string $method
     * @param array $postfields
     * @param array $headers
     * @return mixd
     * @author su@ifreegroup.com
     * @date 2019/7/24  11:18
     */
    public static function httpRequest(string $url, string $method, array $postfields = [], array $headers = []): mixd
    {
        $method = strtoupper($method);
        $ci = curl_init();

        //Curl settings
        curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ci, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0");
        curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 60); /* 在发起连接前等待的时间，如果设置为0，则无限等待 */
        curl_setopt($ci, CURLOPT_TIMEOUT, 60); /* 设置cURL允许执行的最长秒数 */
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);

        switch ($method) {
            case "POST":
                curl_setopt($ci, CURLOPT_POST, true);
                if (!empty($postfields)) {
                    $tmpdatastr = is_array($postfields) ? http_build_query($postfields) : $postfields;
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $tmpdatastr);
                }
                break;
            default:
                curl_setopt($ci, CURLOPT_CUSTOMREQUEST, $method); /* //设置请求方式 */
                break;
        }
        $ssl = preg_match('/^https:\/\//i', $url) ? TRUE : FALSE;
        curl_setopt($ci, CURLOPT_URL, $url);
        if ($ssl) {
            curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
            curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, FALSE); // 不从证书中检查SSL加密算法是否存在
        }
        //curl_setopt($ci, CURLOPT_HEADER, true); /*启用时会将头文件的信息作为数据流输出*/
        curl_setopt($ci, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ci, CURLOPT_MAXREDIRS, 2); /* 指定最多的HTTP重定向的数量，这个选项是和CURLOPT_FOLLOWLOCATION一起使用的 */
        curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ci, CURLINFO_HEADER_OUT, true);
        $response = curl_exec($ci);


        curl_close($ci);

        return $response;
    }
}