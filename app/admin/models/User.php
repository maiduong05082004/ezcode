<?php
namespace App\Admin\Models;

class User extends BaseModel
{
    protected $table = 'users';

    public function getUser() {
        $query = "SELECT * FROM " . $this->table;
        $this->setQuery($query);
        return $this->loadAllRows();
    }

    
    public function loadOneUser($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $this->setQuery($query);
        return $this->loadRow([$id]);
    }
    public function insertUser($name, $image, $email, $address, $tel) {
        $query = "INSERT INTO `$this->table` (`name`, `image`, `email`,  `address`, `tel`) VALUES (?, ?, ?, ?,?) ";
        $this->setQuery($query);
        return $this->execute([$name, $image, $email, $address, $tel]);
    }

    public function updateUser($id,$name, $image, $email, $address, $tel) {
        if($image!="")
        {
            $query = "UPDATE `$this->table` SET `name` = ?, `image` = ?, `email` = ?, `address` = ?, `tel` = ? WHERE `id` = ?";
            $this->setQuery($query);
            return $this->execute([$name, $image,  $email , $address, $tel, $id]);
        }
        else
        {
            $query = "UPDATE `$this->table` SET `name` = ?, `email` = ?, `address` = ?, `tel` = ? WHERE `id` = ?";
            $this->setQuery($query);
            return $this->execute([$name,  $email , $address, $tel, $id]);
        }
        
    }


    public function deleteOneUser($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($query);
        $this->execute([$id]);
    }
}
?>
