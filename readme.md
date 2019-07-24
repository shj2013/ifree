当前类库的静态方法有
/**
*用于统一API 的输出格式
*@param string $msg  API 输出的描述
*@param string $code 状态码
*@param array $data 返回的业务数据
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
