<?php
/**
 * 日志类
 */

namespace core\lib;

class log
{
    /**
     * 1.确定日志存储方式
     * 2.写入日志
     */
    static $class;
    /*初始化方法*/
    static public function init()
    {
        /*确定日志存储的方式*/
        $driver = conf::get_conf('DRIVER','log');
        $class = '\\core\lib\driver\log\\'.$driver;
        self::$class = new $class;
    }

    static public function log($name,$file = 'log')
    {
        self::$class->logs($name,$file);
    }
}