<?php

namespace Lysice\Sms;

/**
 * Class SmsService
 * @package Lysice\Sms
 */
class SmsService
{
    /**
     * 字段验证
     * @param array $fields
     * @param array $data
     * @throws \Exception
     */
    private static function validateFields(array $fields = [], array $data = [])
    {
        foreach ($fields as $field) {
            if (is_null($data[$field])) {
                throw new \Exception('字段' . $field . '不能为空!');
            }
        }
    }

    /**
     * 短信发送service 公有方法
     * @param array $data
     * @return bool|\stdClass
     * @throws \Exception
     */
    public static function send($data = []) {

        $params = [];

        $config = config('sms');
        if (empty($config)) {
            throw new \Exception('暂无配置, 请先发布配置后使用Laravel-sms');
        }
        $fields = ['mobile', 'TemplateParam'];
        self::validateFields($fields, $data);

        // *** 需用户填写部分 ***
        $security = false;
        $accessKeyId = $config['access_secret_id'];
        $accessKeySecret = $config['access_secret_key'];
        $params["PhoneNumbers"] = $data['mobile'];
        $params["SignName"] = $config['sign_name'];
        $params["TemplateCode"] = $config['message_template_code'];
        $params['TemplateParam'] = $data['TemplateParam'];

        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
        if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
            $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
        }

        // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
        $helper = new SignatureHelper();

        // 此处可能会抛出异常，注意catch
        $content = $helper->request(
            $accessKeyId,
            $accessKeySecret,
            $config['sms_url'],
            array_merge($params, array(
                "RegionId" => "cn-hangzhou",
                "Action" => "SendSms",
                "Version" => "2017-05-25",
            )),
            $security
        );

        return $content;
    }
}
