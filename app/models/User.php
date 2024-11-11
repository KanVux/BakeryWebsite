<?php
namespace App\Models;

use PDO;

class User extends Model
{
    public int $id = 0;
    public string $name;
    public string $email;
    public string $address = '';
    public string $password;
    public int $acc_type = 0; // 0 for regular user, 1 for admin
    public string $created_at;
    public string $updated_at;

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo);
    }

    public function getUsers($select = ['*'], $limit = 12): array
    {
        return $this->getItems(self::class, 'users', $select, $limit);
    }

    public function where(string $column, string $value): ?User
    {
        $statement = $this->db->prepare("SELECT * FROM users WHERE $column = :value");
        $statement->execute(['value' => $value]);
        $row = $statement->fetch();

        if ($row) {
            $this->fillFromDbRow($row);
            return $this; // Trả về đối tượng User nếu tìm thấy
        }

        return null; // Trả về null nếu không tìm thấy người dùng
    }


    public function fillFromDbRow(array $row)
    {
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->email = $row['email'];
        $this->password = $row['password'];
        $this->acc_type = $row['acc_type'];
        $this->address = $row['address'];
        $this->created_at = $row['created_at'];
        $this->updated_at = $row['updated_at'];
    }

    public function save(): bool
    {
        $result = false;

        if ($this->id <= 0) {
            $statement = $this->db->prepare(
                'INSERT INTO users (name, email, password, acc_type, address, created_at, updated_at) 
                VALUES (:name, :email, :password, :acc_type, :address, now(), now())'
            );
            $result = $statement->execute([
                'name' => $this->name,
                'email' => $this->email,
                'password' => password_hash($this->password, PASSWORD_BCRYPT),
                'acc_type' => $this->acc_type,
                'address' => $this->address,
            ]);

            if ($result) {
                $this->id = $this->db->lastInsertId();
            }
        } else {
            $statement = $this->db->prepare(
                'UPDATE users SET name = :name, email = :email, password = :password, 
                acc_type = :acc_type, address = :address, updated_at = now() WHERE id = :id'
            );
            $result = $statement->execute([
                'name' => $this->name,
                'email' => $this->email,
                'password' => password_hash($this->password, PASSWORD_BCRYPT),
                'address' => $this->address,
                'acc_type' => $this->acc_type,
                'id' => $this->id
            ]);
        }

        return $result;
    }

    public function delete(): bool
    {
        if ($this->id) {
            $statement = $this->db->prepare("DELETE FROM users WHERE id = :id");
            return $statement->execute(['id' => $this->id]);
        }
        return false;
    }


    public function find($id)
    {
        $statement = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $statement->execute(['id' => $id]);
        $row = $statement->fetch();
        if ($row) {
            $this->fillFromDbRow($row);
        }
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