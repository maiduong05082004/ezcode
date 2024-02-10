<?php

namespace App\Admin\Models;

class  Category extends BaseModel {
    protected  $table = 'categorys';
    public function  getAllCategory(){
        $query = "SELECT * FROM " . $this->table;
        $this->setQuery($query);
        return $this->loadAllRows();
    }
    public function loadOneCategory($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $this->setQuery($query);
        return $this->loadRow([$id]);
    }
    public function insertCategory($name) {
        $query = "INSERT INTO `$this->table` (`name`) VALUES (?)";
        $this->setQuery($query);
        return $this->execute([$name]);
    }

    public function updateCategory($id, $name) {
            $query = "UPDATE `$this->table` SET `name` = ? WHERE `id` = ?";
            $this->setQuery($query);
            return $this->execute([$name,$id]);
        
    }


    public function deleteOneCategory($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($query);
        $this->execute([$id]);
    }




}
