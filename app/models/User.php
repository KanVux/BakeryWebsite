<?php

namespace App\Models;

use PDO;

class User extends Model {
    protected PDO $db;
    public int $id = -1;
    public string $name = '';  // Khởi tạo mặc định
    public string $password = '';  // Khởi tạo mặc định
    public string $email = '';  // Khởi tạo mặc định
    public string $address = '';  // Khởi tạo mặc định
    public int $acc_type = 0;  // Khởi tạo mặc định

    public function __construct(PDO $pdo) {
        $this->db = $pdo;
    }

    public function getUsers(){
        return $this->getItems($this::class,'users',['*'], null);
    }
    public function where(string $column, $value): User
    {
        $statement = $this->db->prepare("select * from users where $column = :value");
        $statement->execute(['value' => $value]);
        $row = $statement->fetch();
        if ($row) {
            $this->fillFromDbRow($row);
        }
        return $this;
    }
    public function fillFromDbRow(array $row)
    {
        $this->id = $row['id'];
        $this->email = $row['email'];
        $this->name = $row['name'];
        $this->password = $row['password'];
        $this->address = $row['address'];
        $this->acc_type = $row['acc_type'];
    }


    public function save(): bool
    {
        $result = false;

        if ($this->id >= 0) {
            $statement = $this->db->prepare(
                'update users set email = :email, username = :name, password = :password,
          address = :address,updated_at = now() where id = :id'
            );
            $result = $statement->execute([
                'id' => $this->id,
                'email' => $this->email,
                'name' => $this->name,
                'password' => $this->password,
                'address'=>$this->address
            ]);
        } else {
            $statement = $this->db->prepare(
                'insert into users (email, name, password, address, created_at, updated_at)
          values (:email, :name, :password, :address, now(), now())'
            );
            $result = $statement->execute([
                'email' => $this->email,
                'name' => $this->name,
                'password' => $this->password,
                'address' => $this->address
            ]);
            if ($result) {
                $this->id = $this->db->lastInsertId();
            }
        }

        return $result;
    }
    public function fill(array $data): User
    {
        $this->email = $data['email'];
        $this->name = $data['name'];
        $this->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->address = $data['address'];
        return $this;
    }
    private function isEmailInUse(string $email): bool
    {
        $statement = $this->db->prepare('select count(*) from users where email = :email');
        $statement->execute(['email' => $email]);
        return $statement->fetchColumn() > 0;
    }
    public function validate(array $data): array
    {
        $errors = [];

        if (!$data['email']) {
            $errors['email'] = 'Invalid email.';
        } elseif ($this->isEmailInUse($data['email'])) {
            $errors['email'] = 'Email already in use.';
        }

        if (strlen($data['password']) < 6) {
            $errors['password'] = 'Password must be at least 6 characters.';
        } elseif ($data['password'] != $data['password_confirmation']) {
            $errors['password'] = 'Password confirmation does not match.';
        }
        return $errors;
    }
}