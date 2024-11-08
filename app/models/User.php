<?php

namespace App\Models;

use PDO;

class User extends Model{
    private PDO $db;
    public int $id = -1;
    public string $username;
    public int $user_id;
    public string $password;
    public string $email;
    public string $address;

    public function __construct(PDO $pdo){
        parent::__construct($pdo);
    }
    private function fillFromDbRow(array $row)
    {
        $this->id = $row['id'];
        $this->user_id = $row['user_id'];
        $this->email = $row['email'];
        $this->name = $row['name'];
        $this->password = $row['password'];
        $this->address = $row['address'];
    }
}