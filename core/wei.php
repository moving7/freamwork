<?php

namespace core;

class wei
{
    /**
    * 临时变量
    * 用来储存临时加载的类
    * $classMap
    */
    public static $classMap = array('');

    static public function run()
    {
        /*加载路由类*/
        $route = new \core\lib\route();
        /*控制器名*/
        $controllerClass = $route->controller;
        /*方法名*/
        $action = $route->action;
        /*控制器文件(路径)*/
        $controller_file = APP.'/controller/'.$controllerClass.'Controller.php';
        /*实例化控制器*/
        $ctrlClass = '\\'.MODULE.'\controller\\'.$controllerClass.'Controller';
        /*判断控制器是否存在*/
        if(is_file($controller_file)) {
            /*加载控制器文件*/
            include $controller_file;
            /*实例化控制器*/
            $controller = new $ctrlClass();
            /*执行对应方法*/
            $controller->$action();
        } else {
            /*抛出异常*/
            throw new \Exception('找不到控制器'.$controllerClass);
        }
    }

    /*自动加载类库*/

    static public function load($class)
    {
        /*判断是否引入了一个类*/
        if(isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\','/',$class);
            $file = WEI.DS.$class.'.php';
            if(is_file($file)) {
                /*加载类*/
                include($file);
                /*存入静态变量中*/
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }
}

