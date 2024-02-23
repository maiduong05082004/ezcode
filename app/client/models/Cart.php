<?php

namespace App\Client\Models;

class  Cart extends BaseModel {
    protected  $table = 'cart';
    public function  getAllCart(){
        $query = "SELECT * FROM " . $this->table;
        $this->setQuery($query);
        return $this->loadAllRows();
    }
    public function loadOneCart($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $this->setQuery($query);
        return $this->loadRow([$id]);
    }
    public function insertCart($name) {
        $query = "INSERT INTO `$this->table` (`name`) VALUES (?)";
        $this->setQuery($query);
        return $this->execute([$name]);
    }

    public function updateCart($id, $name) {
            $query = "UPDATE `$this->table` SET `name` = ? WHERE `id` = ?";
            $this->setQuery($query);
            return $this->execute([$name,$id]);
        
    }


    public function deleteOneCart($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($query);
        $this->execute([$id]);
    }




}
