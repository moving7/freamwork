<?php 
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
/*声明Header*/
header('content-type:text/html;charset=utf-8');
/*定义框架目录*/
define('WEI',realpath('./'));
/*自定义*/
define('DS','/');
/*定义框架核心文件目录*/
define('CORE',WEI.'/core');
/*项目文件目录*/
define('APP',WEI.'/apps');
/*定义模块*/
define('MODULE','apps');
/*调错模式*/
define('DEBUG',false);
if(file_exists('vendor/autoload.php')) {
    include_once "vendor/autoload.php";
}
/*进行判断调错模式是否开启*/
if(DEBUG) {
    /*判断composer类*/
    if(file_exists('vendor/filp')) {
        $whoops = new \Whoops\Run;
        $errorTitle = 'Error';
        $option = new \Whoops\Handler\PrettyPageHandler();
        $option->setPageTitle($errorTitle);
        $whoops->pushHandler($option);
        $whoops->register();
    }
    ini_set('display_errors', 'ON');
} else {
    ini_set('display_errors', 'OFF');
}
/*加载函数库*/
include CORE.'/common/function.php';
/*加载核心文件*/
include CORE.'/wei.php';

/*自动加载类*/
spl_autoload_register('\core\wei::load');

/*启动框架*/
\core\wei::run();
