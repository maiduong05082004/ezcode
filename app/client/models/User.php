<?php
namespace App\Client\Models;

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
    public function insertUser($name, $image, $email, $address, $tel, $password, $username, $membership, $role) {
        $query = "INSERT INTO `$this->table` (`name`, `image`, `email`, `address`, `tel`, `password`, `username`, `membership`, `role`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->setQuery($query);
        return $this->execute([$name, $image, $email, $address, $tel, $password, $username, $membership, $role]);
    }
    
    public function updateUser($id,$name, $image, $email, $address, $tel, $password, $username, $membership) {
        if($image!="")
        {
            $query = "UPDATE `$this->table` SET `name` = ?, `image` = ?, `email` = ?, `address` = ?, `tel` = ?, `password` = ?, `username` = ?, `membership` = ? WHERE `id` = ?";
            $this->setQuery($query);
            return $this->execute([$name, $image,  $email , $address, $tel, $password, $username, $membership, $id]);
        }
        else
        {
            $query = "UPDATE `$this->table` SET `name` = ?, `email` = ?, `address` = ?, `tel` = ?, `password` = ?, `username` = ?, `membership` = ? WHERE `id` = ?";
            $this->setQuery($query);
            return $this->execute([$name, $email , $address, $tel, $password, $username, $membership, $id]);
        }
        
    }
    public function deleteOneUser($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($query);
        $this->execute([$id]);
    }
    public function checkUser($user, $password) {
        $query = "SELECT * FROM `$this->table` WHERE username=? AND password=?";
        $this->setQuery($query);
        $userData = $this->loadRow([$user,$password]);
        return $userData ? get_object_vars($userData) : null;
    }
    
    
}
?>
