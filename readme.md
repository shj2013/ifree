#当前类库的静态方法有

***
    命名空间 ifreeGroup
    use ifreeGroup/IfreeGroup
    > IfreeGroup::json($msg,$code,$data); //用于统一API 的输出格式
    > IfreeGroup::createRandomStr(32);//返回随机字符串
    > IfreeGroup::emailPattern($email); //邮箱格式是否正确
    > IfreeGroup::getIPaddress(); //获取客户端的真实地址
    > IfreeGroup::httpRequest($url,$method,$postfields,$headers); //一般以POST 请求为好
```
    /**
    *用于统一API 的输出格式
    *@param string $msg  API 输出的描述
    *@param string $code 状态码
    *@param array $data 返回的业务数据
    *@return string 返回json 数据
    */
    use ifreeGroup/IfreeGroup;
    IfreeGroup::json($msg,$code,$data);
    返回的数据参考为
    {
        "msg":"登录成功",
        "code":"2000",
        "data":{
            "user_id":20,
            "account":"12121@qq.com",
            "token":"9a2eb00e19ae1fad7ba130ca80ec6168",
            "user_info":{
                "user_id":20,
                "email":"12121@qq.com",
                "mobile":null,
                "area_code":null,
                "reg_time":"1517820046",
                "nickname":null,
                "first_name":"张",
                "last_name":"大炮",
                "user_token":null,
                "extend":{
                    "sex":1,
                    "birthday":null,
                    "country":null,
                    "avatar":null,
                    "avatar_thumb":null,
                    "device_token":"xxxxx"
                },
                "percent":"42%",
                "open":[
                    {
                        "open_name":"微信",
                        "open_type_id":2,
                        "openid":null
                    },
                    {
                        "open_name":"facebook",
                        "open_type_id":3,
                        "openid":null
                    },
                    {
                        "open_name":"ifree",
                        "open_type_id":4,
                        "openid":null
                    }
                ]
            }
        }
    }
```

```
/**
*随机数生成
*@param string $length 随机机数长度 最大值为52
*@return string 返回随机字符串
*/
使用方法
use ifreeGroup/IfreeGroup;
IfreeGroup::createRandomStr(32);
返回的数据为：64d6960e728b4397f47c13d620f6f78d
```
```
/**
*验证邮件格式是否正确
*@param string $email  邮箱
*@return bool
*/
使用方法：
use ifreeGroup/IfreeGroup;
IfreeGroup::emailPattern('su@ifreegroup.com');
返回的数据为: true;

```
```
/**
*获取客户端的真实地址
*@param 不用传值，直接调用
*@return string 直接返回IP 地址
*/
使用方法：
use ifreeGroup/IfreeGroup;
IfreeGroup::getIPaddress();
返回 IP 地址
```

```
    /**
     * curl 模拟http post/get 请求
     * @param string $url
     * @param string $method
     * @param array $postfields
     * @param array $headers
     * @return mixd
     * @author su@ifreegroup.com
     * @date 2019/7/24  11:18
     */
    use ifreeGroup/IfreeGroup;
    IfreeGroup::httpRequest();
```


