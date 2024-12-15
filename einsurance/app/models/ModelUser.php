<?php
class ModelUser extends Database
{
    private $table_name = "tbl_user";

    public function __construct()
    {
        parent::__construct();
        if ($this->table_name == "") {
            echo "Error Tabel Name Null";
            die();
        }
    }

    // function lainnya
    public function getAll()
    {
        $query = "SELECT * from " . $this->table_name;
        return $this->query($query)->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOne($id)
    {
        $query = "SELECT * from " . $this->table_name . " WHERE id = :id";
        return $this->query($query, array(':id' => $id))->fetch(PDO::FETCH_OBJ);
    }

    public function checkAdmin()
    {
        $query = "SELECT * from " . $this->table_name . " WHERE role = :role";
        return $this->query($query, array(':role' => "admin"))->fetchAll(PDO::FETCH_OBJ);
    }

    public function createOne($data)
    {
        $query = "INSERT INTO $this->table_name (username, password, role) VALUES (:username, :password, :role)";
        return $this->query($query, $data);
    }

    public function updateOne($data)
    {
        $query = "UPDATE $this->table_name SET nama = :nama, nim = :nim, email = :email, jurusan = :jurusan WHERE id = :id";
        return $this->query($query, $data);
    }

    public function deleteOne($id)
    {
        $query = "DELETE FROM $this->table_name WHERE id = :id";
        return $this->query($query, array(':id' => $id));
    }


    public function checkUsername($username)
    {
        $query = "SELECT * from " . $this->table_name . " WHERE username = :username";
        return $this->query($query, array(':username' => $username))->fetch(PDO::FETCH_OBJ);
    }

    public function updateLastLogin($userId)
    {
        $query = "UPDATE $this->table_name SET last_login = :last_login WHERE id = :id";
        $params = array(
            ':last_login' => date('Y-m-d H:i:s'),
            ':id' => $userId,
        );
        return $this->query($query, $params);
    }
}
