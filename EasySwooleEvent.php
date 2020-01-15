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
use EasySwoole\ORM\Db\Config;

class EasySwooleEvent implements Event
{

    public static function initialize()
    {
        // TODO: Implement initialize() method.
        date_default_timezone_set('Asia/Shanghai');
        define(ROOT, __DIR__);
	    self::loadDB();
    }

    public static function mainServerCreate(EventRegister $register)
    {
        $config = new Config();
        $config->setDatabase('xm_activity');
        $config->setUser('root');
        $config->setPassword('xmw521.');
        $config->setHost('127.0.0.1');
        DbManager::getInstance()->addConnection(new Connection($config));//数据库配置初始化
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
       
    }
}
