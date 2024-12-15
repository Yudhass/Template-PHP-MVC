<?php
class ModelAsuransi extends Database
{
    private $table_name = "asuransi";

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
        // Query untuk memasukkan data asuransi
        $query = "INSERT INTO asuransi (payor_asuransi, kode, produk, pelayanan_ri, pelayanan_rj, contoh_kartu, call_center, penulisan_invoice, struk_loa_loc) 
              VALUES (:payor_asuransi, :kode, :produk, :pelayanan_ri, :pelayanan_rj, :contoh_kartu, :call_center, :penulisan_invoice, :struk_loa_loc)";

        // Eksekusi query dengan parameter yang sesuai
        return $this->query($query, $data);
    }


    public function updateOne($data)
    {
        $query = "UPDATE $this->table_name SET payor_asuransi = :payor_asuransi, kode = :kode, pelayanan_ri = :pelayanan_ri, pelayanan_rj = :pelayanan_rj, produk = :produk, contoh_kartu = :contoh_kartu, call_center = :call_center, penulisan_invoice = :penulisan_invoice ,struk_loa_loc = :struk_loa_loc WHERE id = :id";

        return $this->query($query, $data);
    }

    public function deleteOne($id)
    {
        $query = "DELETE FROM $this->table_name WHERE id = :id";
        return $this->query($query, array(':id' => $id));
    }
}
