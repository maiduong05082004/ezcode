<?php

namespace App\Admin\Models;

class  Membership extends BaseModel {
    protected  $table = 'membership';
    public function  getAllMembership(){
        $query = "SELECT * FROM " . $this->table;
        $this->setQuery($query);
        return $this->loadAllRows();
    }
    public function loadOneMembership($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $this->setQuery($query);
        return $this->loadRow([$id]);
    }
    public function insertMembership($name) {
        $query = "INSERT INTO `$this->table` (`name`) VALUES (?)";
        $this->setQuery($query);
        return $this->execute([$name]);
    }

    public function updateMembership($id, $name) {
            $query = "UPDATE `$this->table` SET `name` = ? WHERE `id` = ?";
            $this->setQuery($query);
            return $this->execute([$name,$id]);
        
    }


    public function deleteOneMembership($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($query);
        $this->execute([$id]);
    }




}
