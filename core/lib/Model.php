<?php

namespace core\lib;


class Model extends \PDO
{
    public function __construct()
    {
        $dsn = 'mysql:host=127.0.0.1;dbname=115';
        $username = '115';
        $password = '!@#qwe123';
        try{
            parent::__construct($dsn, $username, $password);
        } catch (\PDOException $e) {
            p($e->getMessage());
        }
    }
}