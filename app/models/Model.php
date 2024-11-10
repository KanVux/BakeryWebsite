<?php

namespace App\Models;

use PDO;

class Model{
    protected PDO $db;

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

}