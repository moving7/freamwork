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

