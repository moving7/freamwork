<?php
/**
 * 文件系统
 */
namespace core\lib\driver\log;

use core\lib\conf;

class file
{
    /*日志存储位置*/
    public $path;

    public function __construct()
    {
        $log = conf::get_conf('OPTION','log');
        $this->path = $log['PATH'].date('Y-m-d');
    }

    /*写入日志*/
    public function logs($msg,$file = 'log')
    {
        /**
         * 1.判断日志是否存在??新建目录;
         * 2.写入日志
         */
        /*判断路径是否存在*/
        if(!is_dir($this->path)) {
            mkdir($this->path, 0777, true);
        }
        return file_put_contents($this->path.'/'.$file.'.php',date('Y-m-d H:i:s').' '.json_encode($msg).PHP_EOL,FILE_APPEND);
    }
}