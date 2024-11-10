<?php
namespace App\Models;

use PDO;

class Product extends Model
{
    public int $product_id = 0;
    public string $product_name;
    public int $price;
    public int $size;
    public string $flavour;
    public int $shape = 0;
    public string $product_description = ''; 
    public string $product_img = ''; 
    public string $category_id; 
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
        $statement = $this->db->prepare("SELECT * FROM product  WHERE $column = :column");
        $statement->execute(['column' => $value]);
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
        $this->category_id = $row['category'] ?? 0;
        $this->flavour = $row['flavour'] ?? '';
        $this->size = $row['size'] ?? 1;
        $this->shape = $row['shape'] ?? 1;
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
            'updated_at' => $this->updated_at,
            'category_id' => $this->category_id,
        ];
    }

    public function find($product_id)
    {
        $statement = $this->db->prepare('SELECT * FROM product WHERE product_id = :product_id');
        $statement->execute(['product_id' => $product_id]);
        $row = $statement->fetch();
        if ($row) {
            $this->fillFromDbRow($row);
        }
        return $this;
    }

    public function save(): bool
    {
        $result = false;

        if ($this->product_id <= 0) {  // Nếu là sản phẩm mới
            // Thực hiện INSERT vào cơ sở dữ liệu
            $statement = $this->db->prepare(
                'INSERT INTO product (product_name, price, product_description, product_img, category, created_at, updated_at) 
            VALUES (:product_name, :price, :product_description, :product_img, :category_id, now(), now())'
            );
            $result = $statement->execute([
                'product_name' => $this->product_name,
                'price' => $this->price,
                'product_description' => $this->product_description,
                'product_img' => $this->product_img,
                'category_id' => $this->category_id
            ]);

            // Nếu thành công, gán ID mới vào đối tượng
            if ($result) {
                $this->product_id = $this->db->lastInsertId();
            }
        } else {  // Nếu là sản phẩm đã tồn tại, thực hiện UPDATE
            // Thực hiện UPDATE trong cơ sở dữ liệu
            $statement = $this->db->prepare(
                'UPDATE product SET product_name = :product_name, price = :price, 
            product_description = :product_description, product_img = :product_img, 
            category = :category_id, updated_at = now() WHERE product_id = :product_id'
            );
            $result = $statement->execute([
                'product_name' => $this->product_name,
                'price' => $this->price,
                'product_description' => $this->product_description,
                'product_img' => $this->product_img,
                'category_id' => $this->category_id,
                'product_id' => $this->product_id  // Thêm tham số product_id để sử dụng trong câu lệnh UPDATE
            ]);
        }

        return $result;
    }


    public function fill(array $data): self
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                if ($value === null && gettype($this->$key) === 'string') {
                    $this->$key = ''; 
                } else {
                    $this->$key = $value;
                }
            }
        }
        return $this;
    }
    public function delete(): bool
    {
        if ($this->product_id) {
            $statement = $this->db->prepare("DELETE FROM product WHERE product_id = :product_id");
            return $statement->execute(['product_id' => $this->product_id]);
        }
        return false;
    }

}
