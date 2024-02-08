<?php
namespace App\Client\Models;

class Product extends BaseModel
{
    protected $table = 'products';

    public function getProduct() {
        $query = "SELECT * FROM " . $this->table;
        $this->setQuery($query);
        return $this->loadAllRows();
    }
    public function getProductTop9() {
        $query = "SELECT * FROM " . $this->table . " LIMIT 9";
        $this->setQuery($query);
        return $this->loadAllRows();
    }    
    public function loadOneProduct($id) {
        $query = "SELECT products.*, categorys.name AS category_name 
                  FROM " . $this->table . " 
                  LEFT JOIN categorys ON products.category = categorys.id
                  WHERE products.id = ?";
        $this->setQuery($query);
        return $this->loadRow([$id]);
    }    
    public function insertProduct($name, $image, $price, $describe, $category) {
        $query = "INSERT INTO `$this->table` (`name`, `image`, `price`, `describe`, `category`) VALUES (?, ?, ?, ?, ?)";
        $this->setQuery($query);
        return $this->execute([$name, $image, $price, $describe, $category]);
    }

    public function updateProduct($id, $name, $image, $price, $describe, $category) {
        if($image!="")
        {
            $query = "UPDATE `$this->table` SET `name` = ?, `image` = ?, `price` = ?, `describe` = ?, `category` = ? WHERE `id` = ?";
            $this->setQuery($query);
            return $this->execute([$name, $image, $price, $describe, $category, $id]);
        }
        else
        {
            $query = "UPDATE `$this->table` SET `name` = ?, `price` = ?, `describe` = ?, `category` = ? WHERE `id` = ?";
            $this->setQuery($query);
            return $this->execute([$name, $price, $describe, $category, $id]);
        }
        
    }

    public function deleteOneProduct($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($query);
        $this->execute([$id]);
    }
    public function getProductByCategory() {
        $query = "SELECT products.*, categorys.name AS category_name 
                  FROM " . $this->table . " 
                  LEFT JOIN categorys ON products.category = categorys.id";
        $this->setQuery($query);
        return $this->loadAllRows();
    }
    
}
?>
