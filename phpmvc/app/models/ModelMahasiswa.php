<?php
class ModelMahasiswa extends Database
{
    private $table_name = "mahasiswa";

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

    public function createOne($data)
    {
        $query = "INSERT INTO $this->table_name (nama, nim, email, jurusan) VALUES (:nama, :nim, :email, :jurusan)";
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

    
}
?>