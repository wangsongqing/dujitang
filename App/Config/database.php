<?php
/**
 * Created by PhpStorm.
 * User: tioncico
 * Date: 2018/7/19
 * Time: 17:53
 */
return [
    // 默认数据连接标识
    'default'     => 'mysql',
    // 数据库连接信息
    'connections' => [
        'mysql' => [
            // 数据库类型
            'type'     => 'mysql',
            // 主机地址
            'hostname' => '127.0.0.1',
            // 用户名
            'username' => 'root',
            // 数据库名
            'database' => 'xm_base',
            // 数据库编码默认采用utf8
            'charset'  => 'utf8',
            // 数据库表前缀
            'prefix'   => 'xm_',
            // 数据库调试模式
            'debug'    => true,
        ],
    ],
];
