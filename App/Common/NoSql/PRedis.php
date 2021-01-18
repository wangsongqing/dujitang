<?php
namespace App\Common\NoSql;

/**
 * 用门面的方式来用redis操作
 * @author wangsongqing
 */
class PRedis 
{
	public static function __callStatic($name, $arguments = [])
    {
    	$redis = \EasySwoole\RedisPool\Redis::defer('redis');
    	return call_user_func_array([$redis,$name], $arguments);
    }
}
