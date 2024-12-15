<?php

class Mahasiswa extends Controller
{

    private $ModelMahasiswa;

    public function __construct()
    {
        $this->ModelMahasiswa = $this->loadModel('ModelMahasiswa');
    }


    public function index()
    {
        $data = array(
            'title' => 'Data Mahasiswa',
            'data_mahasiswa' => $this->ModelMahasiswa->getAll(),
        );

        $this->loadView('templates/header', $data);
        $this->loadView('templates/navbar');
        $this->loadView('mahasiswa/index', $data);
        $this->loadView('templates/footer');
    }

    public function add_data()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location : ' . BASEURL . 'mahasiswa');
        }

        $data = array(
            'nama' => $_POST['nama'],
            'nim' => $_POST['nim'],
            'email' => $_POST['email'],
            'jurusan' => $_POST['jurusan'],
        );

        $proc = $this->ModelMahasiswa->createOne($data);
        if ($proc) {
            header('Location: ' . BASEURL . 'mahasiswa');
        } else {
            header('Location: ' . BASEURL . 'mahasiswa');
        }
    }

    public function detail($id)
    {
        $data_mahasiswa = $this->ModelMahasiswa->getOne($id);
        if(!$data_mahasiswa){
            header('Location: '.BASEURL.'mahasiswa');
        }

        $data = array(
            'title' => 'Detail Data Mahasiswa',
            'data_mahasiswa' => $data_mahasiswa,
        );

        $this->loadView('templates/header', $data);
        $this->loadView('templates/navbar');
        $this->loadView('mahasiswa/detail', $data);
        $this->loadView('templates/footer');
    }

    public function edit($id)
    {
        $data_mahasiswa = $this->ModelMahasiswa->getOne($id);
        if(!$data_mahasiswa){
            header('Location: '.BASEURL.'mahasiswa');
        }

        $data = array(
            'title' => 'Detail Data Mahasiswa',
            'data_mahasiswa' => $data_mahasiswa,
        );

        $this->loadView('templates/header', $data);
        $this->loadView('templates/navbar');
        $this->loadView('mahasiswa/edit', $data);
        $this->loadView('templates/footer');
    }

    public function update_data($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location : ' . BASEURL . 'mahasiswa');
        }

        $data_mahasiswa = $this->ModelMahasiswa->getOne($id);
        if(!$data_mahasiswa){
            header('Location: '.BASEURL.'mahasiswa');
        }

        $data = array(
            'id' => $data_mahasiswa->id,
            'nama' => $_POST['nama'],
            'nim' => $_POST['nim'],
            'email' => $_POST['email'],
            'jurusan' => $_POST['jurusan'],
        );

        $proc = $this->ModelMahasiswa->updateOne($data);
        if ($proc) {
            header('Location: ' . BASEURL . 'mahasiswa');
        } else {
            header('Location: ' . BASEURL . 'mahasiswa');
        }
    }

    public function delete_data($id)
    {
        $data_mahasiswa = $this->ModelMahasiswa->getOne($id);
        if(!$data_mahasiswa){
            header('Location: '.BASEURL.'mahasiswa');
        }

        $proc = $this->ModelMahasiswa->deleteOne($id);
        if ($proc) {
            header('Location: ' . BASEURL . 'mahasiswa');
        } else {
            header('Location: ' . BASEURL . 'mahasiswa');
        }
    }
}
