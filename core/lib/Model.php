<?php

namespace core\lib;

use \Medoo\Medoo;

class Model extends Medoo
{
    public function __construct()
    {
        $database = conf::get_all('database');
        parent::__construct($database);
    }
}