<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{
    function insertData($table, $dataArray)
    {
        return $this->db->table($table)->insert($dataArray);
    }

    function getDataWhere($table, $dataArray)
    {
        return $this->db->table($table)->where($dataArray)->get()->getResult();
    }

    function getData($table)
    {
        return $this->db->table($table)->get()->getResult();
    }

    function getWhere($table, $column, $value)
    {
        return $this->db->table($table)->where($column, $value)->get()->getResult();
    }
    function updateData($table, $column, $value, $dataArray)
    {
        return $this->db->table($table)->where($column, $value)->update($dataArray);
    }

    function deleteData($table, $column, $value)
    {
        return $this->db->table($table)->where($column, $value)->delete();
    }
}

























?>