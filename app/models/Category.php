<?php

namespace App\Models;

use PDO;

class Category extends Model{

    public string $category_id;
    public string $category_name;
    public string $created_at;
    public string $updated_at;

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    public function getCategories($columns = ['*'], $limit = 12): array{
        $categories = parent::getItems(Category::class, 'category',['*'], null);
        return $categories;
    }
    public function fillFromDbRow(array $row){
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
        $this->created_at = $row['created_at'];
        $this->updated_at = $row['updated_at'];

        return $row;
    }
    public function add(array $data): bool
    {
        $this->fill($data); // Điền dữ liệu vào đối tượng
        return $this->save(); // Lưu vào cơ sở dữ liệu
    }

    // Cập nhật danh mục
    public function edit(array $data): bool
    {
        if ($this->category_id) {
            $this->fill($data);
            return $this->save(); // Cập nhật vào cơ sở dữ liệu
        }
        return false; // Nếu không có id, trả về false
    }

    // Xóa danh mục
    public function delete(): bool
    {
        if ($this->category_id) {
            $statement = $this->db->prepare("DELETE FROM category WHERE id = :id");
            return $statement->execute(['id' => $this->category_id]);
        }
        return false; // Nếu không có id, trả về false
    }

    // Tìm danh mục theo ID
    public function findById(int $id): ?Category
    {
        $statement = $this->db->prepare("SELECT * FROM category WHERE id = :id");
        $statement->execute(['id' => $id]);
        $row = $statement->fetch();
        if ($row) {
            $this->fillFromDbRow($row);
            return $this;
        }
        return null;
    }
}