<?php
namespace App\Admin\Models;

class User extends BaseModel
{
    protected $table = 'users';

    public function getUser() {
        $query = "SELECT *, 
                    CASE 
                        WHEN membership = 1 THEN 'VIP MEMBER'
                        WHEN membership = 2 THEN 'GOLD MEMBER'
                        WHEN membership = 3 THEN 'UNLIMITED MEMBER'
                        ELSE 'Chưa đăng kí'
                    END AS membership_type
                  FROM " . $this->table;
        $this->setQuery($query);
        return $this->loadAllRows();
    }
    

    
    public function loadOneUser($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $this->setQuery($query);
        return $this->loadRow([$id]);
    }
    public function insertUser($name, $image, $email, $address, $tel, $password, $username, $membership) {
        $query = "INSERT INTO `$this->table` (`name`, `image`, `email`,  `address`, `tel`, `password`, `username`, `membership`) VALUES (?, ?, ?, ?,?,?,?,?) ";
        $this->setQuery($query);
        return $this->execute([$name, $image, $email, $address, $tel, $password, $username, $membership]);
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
    
}
?>
