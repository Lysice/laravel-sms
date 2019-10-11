<?php
namespace Lysice\Sms\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class SmsFacade
 * @package Lysice\Sms\Facade
 * @method static function send($data = [])
 */
class SmsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sms';
    }
}
