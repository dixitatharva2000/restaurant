<?php

namespace App\Models;
use CodeIgniter\Model;

class MenuModel extends Model{


    function insertData($table,$dataArray){

        return $this->db->table($table)->insert($dataArray);
    }

    function getData($table){

        if ($table == 'tbl_menu') {
            return $this->db->table($table)->join('tbl_category', 'tbl_category.category_id = tbl_menu.category_id')->join('tbl_subcategory', 'tbl_subcategory.subcategory_id = tbl_menu.subcategory_id')->get()->getResult();
        } else {
            return $this->db->table($table)->get()->getResult();
        }

       
    }
    function getwhere($table,$column,$value){

        
        if ($table == 'tbl_menu') {
            return $this->db->table($table)->join('tbl_category', 'tbl_category.category_id = tbl_menu.category_id')->join('tbl_subcategory', 'tbl_subcategory.subcategory_id = tbl_menu.subcategory_id')->where($column, $value)->get()->getResult();
        }

        return $this->db->table($table)->where($column,$value)->get()->getResult();
    }

    function updateData($table,$column,$value,$dataArray){

        return $this->db->table($table)->where($column,$value)->update($dataArray);
    }

    function deleteData($table,$column,$value){

        return $this->db->table($table)->where($column,$value)->delete();
    }

}


 


?>