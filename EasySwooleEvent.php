<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/5/28
 * Time: 下午6:33
 */

namespace EasySwoole\EasySwoole;

use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;
use EasySwoole\ORM\DbManager;
use EasySwoole\ORM\Db\Connection;
use EasySwoole\Pool\Config as MemcacheConfig;
use EasySwoole\ORM\Db\Config;

class EasySwooleEvent implements Event
{

    public static function initialize()
    {
        // TODO: Implement initialize() method.
        date_default_timezone_set('Asia/Shanghai');
	    self::loadDB();
        self::MysqlLoad();
    }

    public static function mainServerCreate(EventRegister $register)
    {
        
    }

    public static function onRequest(Request $request, Response $response): bool
    {
        // TODO: Implement onRequest() method.
        return true;
    }

    public static function afterRequest(Request $request, Response $response): void
    {
        // TODO: Implement afterAction() method.
    }
    
    public static function loadDB()
    {
       //redis连接池注册(config默认为127.0.0.1,端口6379)
        $redisconfig = ['host' => '127.0.0.1','port' => '6009','auth' => 'Wangsongqing123@','serialize' => \EasySwoole\Redis\Config\RedisConfig::SERIALIZE_NONE];
        $redisPoolConfig = \EasySwoole\RedisPool\Redis::getInstance()->register('redis',new \EasySwoole\Redis\Config\RedisConfig($redisconfig));
        //配置连接池连接数
        $redisPoolConfig->setMinObjectNum(5);
        $redisPoolConfig->setMaxObjectNum(20);
    }

    public static function MysqlLoad()
    {
        $config = new Config();
        $config->setDatabase('xm_activity');
        $config->setUser('root');
        $config->setPassword('xmw521.');
        $config->setHost('127.0.0.1');
        //连接池配置
        $config->setGetObjectTimeout(3.0); //设置获取连接池对象超时时间
        $config->setIntervalCheckTime(30*1000); //设置检测连接存活执行回收和创建的周期
        $config->setMaxIdleTime(15); //连接池对象最大闲置时间(秒)
        $config->setMaxObjectNum(20); //设置最大连接池存在连接对象数量
        $config->setMinObjectNum(5); //设置最小连接池存在连接对象数量
        $config->setAutoPing(5); //设置自动ping客户端链接的间隔

        DbManager::getInstance()->addConnection(new Connection($config));
    }

}
