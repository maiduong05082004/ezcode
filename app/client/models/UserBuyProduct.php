<?php
namespace App\Client\Models;

class UserBuyProduct extends BaseModel
{
    protected $table = 'user_buy_products';
    public function listProductByUser($id){
        $query = "SELECT ubp.*, u.*, p.*, c.name AS category_name 
        FROM $this->table AS ubp
        LEFT JOIN users AS u ON ubp.user_id = u.id 
        LEFT JOIN products AS p ON ubp.product_id = p.id 
        LEFT JOIN categorys AS C ON p.category=c.id
        WHERE u.id=?";
        $this->setQuery($query);
        return $this->loadAllRows([$id]);
    }
}
?>
