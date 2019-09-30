# 欢迎使用 laravel-sms 阿里云短信扩展包

** laravel-sms 是专门为laravel开发的阿里云短信的发送包。由于官方扩展包包含了太多内容 所以写了这个扩展包。


### 使用

执行命令：`npm install marked`

#### 安装

    composer require lysice/laravel-sms

#### 配置
laravel5以下
config/app.php中注册服务提供器 添加下面一行
laravel5以上无需注册。
```
        \Lysice\Sms\SmsServiceProvider::class
```
#### 使用
```
	$data = ['mobile' => '138xxxxxxxx', 'code' => 'code'];
	Sms::send($data);
```
