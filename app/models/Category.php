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
        $categories = parent::getItems(Category::class, 'category',$columns, null);
        return $categories;
    }
    public function fillFromDbRow(array $row){
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
        $this->created_at = $row['created_at'];
        $this->updated_at = $row['updated_at'];

        return $row;
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
            $statement = $this->db->prepare("DELETE FROM category WHERE category_id = :category_id");
            return $statement->execute(['category_id' => $this->category_id]);
        }
        return false; 
    }

    // Tìm danh mục theo ID
    public function findById(string $id): ?Category
    {
        $statement = $this->db->prepare("SELECT * FROM category WHERE category_id = :id");
        $statement->execute(['id' => $id]);
        $row = $statement->fetch();
        if ($row) {
            $this->fillFromDbRow($row);
            return $this;
        }
        return null;
    }
    public function save(): bool
    {
        $result = false;

        try {
            // Kiểm tra xem category_id có hợp lệ không
            if (empty($this->category_id)) {
                throw new \Exception("Category ID cannot be empty.");
            }

            // Kiểm tra xem category_id có trùng với giá trị đã có trong cơ sở dữ liệu không
            if (!$this->category_id_exists()) {
                if ($this->category_id) {
                    // Nếu không có category_id (khi insert), tạo mới
                    $statement = $this->db->prepare(
                        'INSERT INTO category (category_id, category_name, created_at, updated_at) 
                    VALUES (:category_id, :category_name, now(), now())'
                    );
                    $result = $statement->execute([
                        'category_id' => $this->category_id,
                        'category_name' => $this->category_name,
                    ]);

                    // Kiểm tra xem câu lệnh có thực thi thành công không
                    if (!$result) {
                        $errorInfo = $statement->errorInfo();
                        var_dump($errorInfo);
                    } else {
                        echo "Insert successful!";
                    }
                }
            } else {
                // Nếu category_id đã tồn tại, cập nhật thông tin
                $statement = $this->db->prepare(
                    'UPDATE category SET category_name = :category_name, updated_at = now() WHERE category_id = :category_id'
                );
                $result = $statement->execute([
                    'category_name' => $this->category_name,
                    'category_id' => $this->category_id
                ]);

                // Kiểm tra kết quả cập nhật
                if ($result) {
                    echo "Update successful!";
                } else {
                    echo "No rows affected by the update.";
                    $errorInfo = $statement->errorInfo();
                    var_dump($errorInfo);
                }
            }
        } catch (\PDOException $e) {
            // Lỗi PDO (nếu có)
            var_dump($e->getMessage());
        }

        return $result;
    }

    // Kiểm tra xem category_id đã tồn tại trong cơ sở dữ liệu chưa
    private function category_id_exists(): bool
    {
        $statement = $this->db->prepare('SELECT COUNT(*) FROM category WHERE category_id = :category_id');
        $statement->execute(['category_id' => $this->category_id]);
        $count = $statement->fetchColumn();

        return $count > 0; // Trả về true nếu đã tồn tại, false nếu chưa
    }



}