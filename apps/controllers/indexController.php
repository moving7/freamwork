<?php

namespace apps\controllers;

use \core\wei;

class indexController extends wei
{
    public function index()
    {
//        p('it is index');
        $data = ['code'=>200];
//        $model = new \core\lib\model();
//        $sql = 'SELECT * FROM 115_users';
//        $data = $model->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        $this->assign('data',$data);
        $this->assign('title',['code'=>404]);
        $this->display('index.html');
    }
    public function show()
    {
        echo '加载成功';
    }
}
