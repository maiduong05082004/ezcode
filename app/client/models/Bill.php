<?php

namespace App\Client\Models;

class  Bill extends BaseModel {
    protected  $table = 'bill';
    public function  getAllBill(){
        $query = "SELECT * FROM " . $this->table;
        $this->setQuery($query);
        return $this->loadAllRows();
    }
    public function loadOneBill($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $this->setQuery($query);
        return $this->loadRow([$id]);
    }
    public function insertBill($name) {
        $query = "INSERT INTO `$this->table` (`name`) VALUES (?)";
        $this->setQuery($query);
        return $this->execute([$name]);
    }

    public function updateBill($id, $name) {
            $query = "UPDATE `$this->table` SET `name` = ? WHERE `id` = ?";
            $this->setQuery($query);
            return $this->execute([$name,$id]);
        
    }


    public function deleteOneBill($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($query);
        $this->execute([$id]);
    }




}
