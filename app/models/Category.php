<?php

namespace App\Models;

use PDO;

class Category extends Model{
    private PDO $db;

    public string $category_id;
    public string $category_name;
    public string $created_at;
    public string $updated_at;

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }
    public function getCategory($columns = ['*'], $limit = 12): array{
        $categories = parent::getItems(Category::class, 'category',['*'],12);
        return $categories;
    }
    public function fillFromDbRow(array $row){
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
        $this->created_at = $row['created_at'];
        $this->updated_at = $row['updated_at'];

        return $row;
    }
}