<?php

namespace apps\controller;

class indexController
{
    public function index()
    {
        p('it is index');
        $model = new \core\lib\model();
        $sql = 'SELECT * FROM 115_users';
        p($model->query($sql)->fetchAll(\PDO::FETCH_ASSOC));
    }
    public function show()
    {
        echo '加载成功';
    }
}
