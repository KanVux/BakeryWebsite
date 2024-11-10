<?php

namespace App\Models;

use PDO;

class Model{
    protected PDO $db;
    public int $id = -1; 

    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }

    public function getItems($className, $table, $select = ['*'], $limit = 12): array
    {
        $columns = implode(',', array_map('trim', $select));
        $items = [];
        try{
            if ($limit === null) {
                $statement = $this->db->prepare('SELECT ' . $columns . ' FROM ' . $table);
            } else {
                $statement = $this->db->prepare('SELECT ' . $columns . ' FROM ' . $table . ' LIMIT :limit');
                $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
            }

            $statement->execute();
            while ($row = $statement->fetch()) {
                $item = new $className($this->db);
                $item->fillFromDbRow($row);
                $items[] = $item;
            }
        } catch (\PDOException $ex){
            echo 'Chi tiết lỗi: ' . $ex->getMessage();
        }
        return $items;
    }
    protected function fillFromDbRow(array $row)
    {
        foreach ($row as $key => $value) {
            $this->$key = $value;
        }
    }
    public function fill(array $data): self
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                if ($value === null && gettype($this->$key) === 'string') {
                    $this->$key = ''; // Provide a default empty string for null values
                } else {
                    $this->$key = $value;
                }
            }
        }
        return $this;
    }
    public function save(): bool
    {   
        // Kiểm tra nếu đối tượng đã có ID (tức là đã tồn tại trong cơ sở dữ liệu)
        if (isset($this->id) && $this->id > 0) {
            // Cập nhật đối tượng
            $fields = [];
            $values = [];
            foreach ($this as $key => $value) {
                if ($key !== 'id') { // Loại bỏ id khỏi dữ liệu cần cập nhật
                    $fields[] = "$key = :$key";
                    $values[":$key"] = $value;
                }
            }
            $values[':id'] = $this->id;
            $setFields = implode(', ', $fields);
            $sql = "UPDATE " . strtolower((new \ReflectionClass($this))->getShortName()) . " SET $setFields WHERE id = :id";
            $statement = $this->db->prepare($sql);
            return $statement->execute($values);
        } else {
            // Thêm mới đối tượng
            $fields = [];
            $placeholders = [];
            $values = [];
            foreach ($this as $key => $value) {
                if ($key !== 'id') {
                    $fields[] = $key;
                    $placeholders[] = ":$key";
                    $values[":$key"] = $value;
                }
            }
            $fieldNames = implode(', ', $fields);
            $placeholdersStr = implode(', ', $placeholders);
            $sql = "INSERT INTO " . strtolower((new \ReflectionClass($this))->getShortName()) . " ($fieldNames) VALUES ($placeholdersStr)";
            $statement = $this->db->prepare($sql);
            $result = $statement->execute($values);

            // Lấy ID của đối tượng vừa thêm
            if ($result) {
                $this->id = $this->db->lastInsertId();
            }

            return $result;
        }
    }
}
