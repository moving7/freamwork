<?php

namespace core\lib;

class conf
{
    /*缓存配置项的静态变量*/
    static public $conf = [];
    /*获取配置*/
    static public function get_conf($name,$file)
    {
        /**
         * 1.判断配置文件是否存在
         * 2.判断配置是否存在
         * 3.缓存配置
         */
        /*配置是否已缓存*/
        if(isset(self::$conf[$file])) {
            return self::$conf[$file][$name];
        } else {
            /*p(1);*/
            $path = WEI . '/core/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                if (isset($conf[$name])) {
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception('没有配置项' . $name);
                }
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }
    /*获取所有相关配置*/
    static public function get_all($file)
    {
        if(isset(self::$conf[$file])) {
            return self::$conf[$file];
        } else {
            /*p(1);*/
            $path = WEI . '/core/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                self::$conf[$file] = $conf;
                return $conf;
            } else {
                throw new \Excepation('找不到配置文件' . $file);
            }
        }
    }
}