<?php

namespace core\lib;

class Model extends \PDO
{
    public function __construct()
    {
        $database = conf::get_all('database');
        $dsn = $database['DB_TYPE'].':'.'host='.$database['DB_HOST'].';dbname='.$database['DB_NAME'].';port='.$database['DB_PORT'];
        try{
            parent::__construct($dsn, $database['DB_USER'], $database['DB_PWD']);
        } catch (\PDOException $e) {
            p($e->getMessage());
        }
    }
}