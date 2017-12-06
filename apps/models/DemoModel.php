<?php
/**
 * Model
 */

namespace apps\models;

use core\lib\Model;

class indexModel extends Model
{
    /*默认表名*/
    public $table = '';

    /*查询*/
    public function lists($table, $columns = '*')
    {
        return $this->select($table, $columns);
    }

    /*查询单条*/
    public function getOne($table, $where = [])
    {
        return $this->get($table, '*', $where);
    }

    /*修改*/
    public function save($table, $data = [], $where = [])
    {
        return $this->update($table, $data, $where);
    }

    /*删除*/
    public function deleteOne($table, $where)
    {
        return $this->delete($table, $where);
    }

    /*添加*/
    public function add($table, $data)
    {
        return $this->insert($table, $data);
    }
}