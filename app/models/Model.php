<?php

namespace App\Models;

use PDO;
use PDOException;
class Model{
    private PDO $db;

    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }

    public function getItems($className, $table, $select = ['*'], $limit = 12): array
    {
        // Ensure column names are properly sanitized and combined
        $columns = implode(',', array_map('trim', $select));
        $items = [];
        try{
            // Prepare the SQL query
            $statement = $this->db->prepare('SELECT ' . $columns . ' FROM ' . $table . ' LIMIT :limit');
            $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
            $statement->execute();

            // Loop through the results and create the objects dynamically
            while ($row = $statement->fetch()) {
                // Dynamically instantiate the object of the provided class
                $item = new $className($this->db);

                // Assuming the fillFromDbRow method exists in every class
                $item->fillFromDbRow($row);

                // Add the item to the results array
                $items[] = $item;
            }
        } catch (PDOException $ex){
            echo 'Chi tiết lỗi: ' . $ex->getMessage();
        }
        return $items;
    }

}