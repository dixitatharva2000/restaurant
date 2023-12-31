<?php

namespace App\Models;

use CodeIgniter\Model;

class TablesModel extends Model
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
        if ($table == 'tbl_tables') {
            return $this->db->table($table)->join('tbl_restaurent', 'tbl_restaurent.restaurent_id = tbl_tables.restaurent_id')->join('tbl_franchise', 'tbl_franchise.franchise_id=tbl_tables.franchise_id')->get()->getResult();
        } else {
            return $this->db->table($table)->get()->getResult();
        }
    }

    function getWhere($table, $column, $value)
    {
        if ($table == 'tbl_tables') {
            return $this->db->table($table)->join('tbl_restaurent', 'tbl_restaurent.restaurent_id = tbl_tables.restaurent_id')->join('tbl_franchise', 'tbl_franchise.franchise_id=tbl_tables.franchise_id')->where($column, $value)->get()->getResult();
        }
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