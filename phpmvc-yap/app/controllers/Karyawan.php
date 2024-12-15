<?php
class Karyawan extends Controller
{
    private $modelKaryawan;
    private $flash;
    private $dataLogin;

    public function __construct()
    {
        $this->modelKaryawan = $this->loadModel('ModelKaryawan');
        $this->flash = new Flasher();
        $this->dataLogin = $_SESSION['user']['data'];
        if ($this->dataLogin === null) {
            $this->flash->setFlash('warning', 'Silahkan login terlebih dahulu');
            header('Location: ' . BASEURL . 'user');
        }
    }

    public function index()
    {
        $data = [
            'title'=> 'Data Karyawan',
            'data_karyawan' => $this->modelKaryawan->getAll(),
        ];
        $this->loadView('templates/header',$data);
        $this->loadView('templates/navbar',$data);
        $this->loadView('karyawan/index',$data);
        $this->loadView('templates/footer');
    }

    public function tambah_data()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location : ' . BASEURL . 'karyawan');
        }

        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'nama' => $_POST['nama'],
            'alamat' => $_POST['alamat'],
        ];

        $proc = $this->modelKaryawan->createOne($data);
        if ($proc) {
            $this->flash->setFlash('success', 'Data berhasil ditambahkan');
            header('Location: ' . BASEURL . 'karyawan');
        } else {
            $this->flash->setFlash('warning', 'Data gagal ditambahkan');
            header('Location: ' . BASEURL . 'karyawan');
        }
    }

    public function edit($id)
    {
        $data_karyawan = $this->modelKaryawan->getOne($id);
        if(!$data_karyawan){
            $this->flash->setFlash('warning', 'Data tidak ditemukan');
            header('Location: '.BASEURL.'karyawan');
        }

        $data = [
            'title'=> 'Edit Data Karyawan',
            'data_karyawan' => $data_karyawan,
        ];
        $this->loadView('templates/header',$data);
        $this->loadView('templates/navbar',$data);
        $this->loadView('karyawan/edit',$data);
        $this->loadView('templates/footer');
    }

    public function update_data($id)
    {
        $data_karyawan = $this->modelKaryawan->getOne($id);
        if(!$data_karyawan){
            $this->flash->setFlash('warning', 'Data tidak ditemukan');
            header('Location: '.BASEURL.'karyawan | Gagal Melaukan update');
        }

        $data = [
            'id' => $data_karyawan->id,
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'nama' => $_POST['nama'],
            'alamat' => $_POST['alamat'],
        ];

        $proc = $this->modelKaryawan->updateOne($data);
        if ($proc) {
            $this->flash->setFlash('success', 'Data berhasil diubah');
            header('Location: ' . BASEURL . 'karyawan');
        } else {
            $this->flash->setFlash('warning', 'Data gagal diubah');
            header('Location: ' . BASEURL . 'karyawan');
        }
        
    }

    public function delete($id)
    {
        $data_karyawan = $this->modelKaryawan->getOne($id);
        if(!$data_karyawan){
            $this->flash->setFlash('warning', 'Data tidak ditemukan');
            header('Location: '.BASEURL.'karyawan');
        }

        $proc = $this->modelKaryawan->deleteOne($id);
        if ($proc) {
            $this->flash->setFlash('success', 'Data berhasil dihapus');
            header('Location: ' . BASEURL . 'karyawan');
        } else {
            $this->flash->setFlash('warning', 'Data gagal dihapus');
            header('Location: ' . BASEURL . 'karyawan');
        }
    }
}
?>