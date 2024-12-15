<?php
class ModelKaryawan extends Database
{
    private $table_name = "karyawan";

    public function __construct()
    {
        parent::__construct();
    }

    // function lainnya
    public function createOne($data)
    {
        $query = "INSERT INTO $this->table_name (email,password, nama, alamat) VALUES (:email, :password, :nama, :alamat)";
        return $this->query($query, $data);
    }

    public function checkEmail($email)
    {
        $query = "SELECT * from " . $this->table_name . " WHERE email = :email";
        return $this->query($query, array(':email' => $email))->fetch(PDO::FETCH_OBJ);
    }

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

    public function updateOne($data)
    {
        $query = "UPDATE $this->table_name SET email = :email, password = :password, nama = :nama, alamat = :alamat WHERE id = :id";
        return $this->query($query, $data);
    }

    public function deleteOne($id)
    {
        $query = "DELETE FROM $this->table_name WHERE id = :id";
        return $this->query($query, array(':id' => $id));
    }
}
?>