# 欢迎使用 laravel-sms 阿里云短信扩展包

laravel-sms 是专门为laravel开发的阿里云短信的发送包。由于官方扩展包包含了太多内容 所以写了这个扩展包。


#### 安装

    composer require lysice/laravel-sms

#### 配置
配置文件中需要配置以下几个参数
`access_secret_id`  
`access_secret_key`
`message_template_code //模板` 
`message_template //模板文本`
`sign_name // 短信模板签名` 

#### 1.laravel
config/app.php中注册服务提供器 添加下面一行
```
        \Lysice\Sms\SmsServiceProvider::class
```
##### 执行命令发布配置文件
```
    php artisan vendor:publish --provider="Lysice/Sms/SmsServiceProvider"
```
#### 2.lumen
##### bootstrap/app.php中配置服务:
```
    $app->register(\Lysice\Sms\SmsServiceProvider::class);
```
##### 拷贝laravel-sms/config下sms.php到项目中config目录。若无config目录则创建。
#### 使用
```
    // 自定义参数,参数为你的消息模板中的变量。 如 我的模板中为code 则自定义参数为 $templateParam = ['code' => 1234];
    $templateParam = ['code' => 1234];
	$data = ['mobile' => '138xxxxxxxx', 'TemplateParam' => $templateParam];
	SmsFacade::send($data);
```
