<?php

namespace Lysice\Sms;

use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * 发布
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/../config' => config_path()], 'sms-config');
    }

    /**
     * 注册
     */
    public function register()
    {
        $this->app->singleton('sms', function () {
            return new SmsService();
        });
    }
}
