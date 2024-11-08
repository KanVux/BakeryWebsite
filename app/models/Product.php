<?php
namespace App\Models;

use PDO;
class Product extends Model{
    
    private PDO $db;

    public int $id = -1;
    public int $product_id;
    public string $product_name;
    public int $price;
    public string $product_description;
    public string $product_img;
    public string $created_at;
    public string $updated_at;
    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    public function getProducts($columns = ['*'], $limit = 12): array{
        $products = parent::getItems(Product::class, 'product', $columns , $limit);
        return $products;
    }

    public function findById() {
        echo __METHOD__;

    }
    public function delete(){
        echo __METHOD__;

    }

    public function fillFromDbRow(array $row): array
    {
        $this->product_id = $row['product_id'];
        $this->product_name = $row['product_name'];
        $this->price = $row['price'];
        $this->product_description = $row['product_description'];
        $this->product_img = $row['product_img'];
        $this->created_at = $row['created_at'];
        $this->updated_at = $row['updated_at'];

        return $row;
    }
    public function toArray(){
        return [
            'product_id' => $this->product_id,
            'product_name' => $this->product_name,
            'price' => $this->price,
            'product_description' => $this->product_description,
            'product_img' => $this->product_img,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}