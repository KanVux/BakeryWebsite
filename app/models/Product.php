<?php
namespace App\Models;

use PDO;

class Product extends Model
{
    
    public int $id = -1;
    public int $product_id;
    public string $product_name;
    public int $price;
    public string $product_description;
    public string $product_img;
    public string $flavour;
    public int $size;
    public int $shape;
    public string $created_at;
    public string $updated_at;

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo);
    }

    public function getProducts($select = ['*'], $limit = 12): array
    {
        return $this->getItems(self::class, 'product', $select, $limit);
    }

    public function where(string $column, string $value): Product
    {
        $statement = $this->db->prepare("SELECT * FROM product WHERE $column = :value");
        $statement->execute(['value' => $value]);
        $row = $statement->fetch();
        if ($row) {
            $this->fillFromDbRow($row);
        }
        return $this;
    }

    public function fillFromDbRow(array $row)
    {
        $this->product_id = $row['product_id'];
        $this->product_name = $row['product_name'];
        $this->price = $row['price'];
        $this->product_description = $row['product_description'];
        $this->product_img = $row['product_img'];
        $this->flavour = $row['flavour'];
        $this->size = $row['size'];
        $this->shape = $row['shape'];
        $this->created_at = $row['created_at'];
        $this->updated_at = $row['updated_at'];
    }

    public function toArray()
    {
        return [
            'product_id' => $this->product_id,
            'product_name' => $this->product_name,
            'price' => $this->price,
            'product_description' => $this->product_description,
            'product_img' => $this->product_img,
            'flavour' => $this->flavour,
            'size' => $this->size,
            'shape' => $this->shape,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}