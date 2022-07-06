<?php


namespace App\Helpers;


use Hyperf\Utils\ApplicationContext;

class Cache
{
    //获取容器对象--单例
    public static function getIns()
    {
        return ApplicationContext::getContainer()->get(\Psr\SimpleCache\CacheInterface::class);
    }

    public static function __callStatic($name, $arguments)
    {
        return self::getIns()->$name(...$arguments);
    }
}