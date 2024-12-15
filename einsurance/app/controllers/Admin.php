<?php

class admin extends Controller
{

    private $modelUser;
    private $modelAsuransi;
    private $flash;

    public function __construct()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']["role"] !== 'admin') {
            // $this->flash->setFlash('warning', 'Silahkan login terlebih dahulu');
            header('Location: ' . BASEURL . 'auth/login');
            exit;
        }
        $this->modelUser = $this->loadModel('ModelUser');
        $this->modelAsuransi = $this->loadModel('ModelAsuransi');
        $this->flash = new Flasher();
    }


    public function index()
    {
        $data = array(
            'title' => 'Data Asuransi',
            'data_asuransi' => $this->modelAsuransi->getAll(),
        );

        $this->loadView('templates/header', $data);
        $this->loadView('templates/navbar');
        $this->loadView('asuransi/index', $data);
        $this->loadView('templates/footer');
    }

    // asuransi
    public function tambah_asuransi()
    {
        $data = array(
            'title' => 'Tambah Data Asuransi',
            'asset_js' => array(
                'js/tambah_asuransi.js'
            ),
        );

        $this->loadView('templates/header', $data);
        $this->loadView('templates/navbar');
        $this->loadView('asuransi/tambah', $data);
        $this->loadView('templates/footer', $data);
    }


    public function tambah_asuransi_submit()
    {
        // Cek apakah request method POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $payor_asuransi = $_POST['payor_asuransi'];
            $kode = $_POST['kode']; 
            $produk = isset($_POST['produk']) ? implode(',', $_POST['produk']) : '';
            $penulisan_invoice = $_POST['penulisan_invoice'];
            $tipe_pelayanan = isset($_POST['tipe_pelayanan']) ? $_POST['tipe_pelayanan'] : array();

            // Cek apakah "ri" atau "rj" ada dalam array
            $pelayanan_ri = in_array('ri', $tipe_pelayanan) ? 1 : 0; // Set boolean 1 atau 0
            $pelayanan_rj = in_array('rj', $tipe_pelayanan) ? 1 : 0;
            $call_center = isset($_POST['call_center']) ? implode(',', $_POST['call_center']) : ''; // Menggabungkan semua call center yang diinput

            // Handle file upload untuk contoh_kartu
            $contoh_kartu = '';
            if (isset($_FILES['contoh_kartu']) && $_FILES['contoh_kartu']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['contoh_kartu']['tmp_name'];
                // Mendapatkan ekstensi file
                $fileExtension = pathinfo($_FILES['contoh_kartu']['name'], PATHINFO_EXTENSION);
                // Menghasilkan nama file acak
                $fileName = rand(100000, 999999) . '.' . $fileExtension;
                $uploadFolder = $_SERVER['DOCUMENT_ROOT'] . '/einsurance/public/img/';  // Folder tujuan di server

                // Pindahkan file ke folder tujuan
                if (move_uploaded_file($fileTmpPath, $uploadFolder . $fileName)) {
                    $contoh_kartu = $fileName; // Menyimpan path file relatif
                }
            }

            // Handle file upload untuk struk_loa_loc
            $struk_loa_loc = '';
            if (isset($_FILES['struk_loa_loc']) && $_FILES['struk_loa_loc']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['struk_loa_loc']['tmp_name'];
                // Mendapatkan ekstensi file
                $fileExtension = pathinfo($_FILES['struk_loa_loc']['name'], PATHINFO_EXTENSION);
                // Menghasilkan nama file acak
                $fileName = rand(100000, 999999) . '.' . $fileExtension;
                $uploadFolder = $_SERVER['DOCUMENT_ROOT'] . '/einsurance/public/img/';  // Folder tujuan di server

                // Pindahkan file ke folder tujuan
                if (move_uploaded_file($fileTmpPath, $uploadFolder . $fileName)) {
                    $struk_loa_loc = $fileName; // Menyimpan path file relatif
                }
            }

            // Menyusun data menjadi array untuk dikirimkan ke model
            $data = array(
                'payor_asuransi' => $payor_asuransi,
                'kode' => $kode,
                'produk' => $produk,
                'pelayanan_ri' => $pelayanan_ri,   // Pastikan ada nilai 1 atau 0 untuk boolean
                'pelayanan_rj' => $pelayanan_rj,   // Pastikan ada nilai 1 atau 0 untuk boolean
                'contoh_kartu' => $contoh_kartu,
                'call_center' => $call_center,
                'penulisan_invoice' => $penulisan_invoice,
                'struk_loa_loc' => $struk_loa_loc
            );

            // Memanggil fungsi model untuk menyimpan data asuransi
            $this->modelAsuransi->createOne($data);

            // Redirect atau tampilkan pesan sukses
            $this->flash->setFlash('success', 'Data Asuransi berhasil ditambahkan');
            header('Location: ' . BASEURL . 'admin');
            exit;
        } else {
            // Jika request bukan POST, redirect ke halaman login atau halaman lain
            header('Location: ' . BASEURL . 'admin');
            exit;
        }
    }

    public function edit_asuransi($id)
    {
        $data_asuransi = $this->modelAsuransi->getOne($id);
        if (!$data_asuransi) {
            header('Location: ' . BASEURL . 'admin');
        }

        $data = array(
            'title' => 'Edit Data Asuransi',
            'data_asuransi' => $data_asuransi,
            'asset_js' => array(
                'js/tambah_asuransi.js'
            ),
        );

        $this->loadView('templates/header', $data);
        $this->loadView('templates/navbar');
        $this->loadView('asuransi/edit', $data);
        $this->loadView('templates/footer', $data);
    }
    public function edit_asuransi_submit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data_asuransi = $this->modelAsuransi->getOne($id);
            if ($data_asuransi === null) {
                $this->flash->setFlash('warning', 'Data Asuransi tidak ditemukan');
                header('Location: ' . BASEURL . 'admin/edit_asuransi/' . $id);
                exit;
            }

            $payor_asuransi = $_POST['payor_asuransi'];
            $kode = $_POST['kode'];
            $produk = isset($_POST['produk']) ? implode(',', $_POST['produk']) : '';
            $penulisan_invoice = $_POST['penulisan_invoice'];
            $tipe_pelayanan = isset($_POST['tipe_pelayanan']) ? $_POST['tipe_pelayanan'] : array();
            $pelayanan_ri = in_array('ri', $tipe_pelayanan) ? 1 : 0;
            $pelayanan_rj = in_array('rj', $tipe_pelayanan) ? 1 : 0;
            $call_center = isset($_POST['call_center']) ? implode(',', $_POST['call_center']) : '';
            $uploadFolder = $_SERVER['DOCUMENT_ROOT'] . '/einsurance/public/img/';

            // Handle contoh_kartu
            $contoh_kartu = $data_asuransi->contoh_kartu; // Gunakan nilai lama sebagai default
            if (isset($_FILES['contoh_kartu']) && $_FILES['contoh_kartu']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['contoh_kartu']['tmp_name'];
                $fileExtension = pathinfo($_FILES['contoh_kartu']['name'], PATHINFO_EXTENSION);
                $fileNameKartu = rand(100000, 999999) . '.' . $fileExtension;

                if (move_uploaded_file($fileTmpPath, $uploadFolder . $fileNameKartu)) {
                    // Hapus file lama jika file baru berhasil diupload
                    if (file_exists($uploadFolder . $contoh_kartu)) {
                        unlink($uploadFolder . $contoh_kartu);
                    }
                    $contoh_kartu = $fileNameKartu;
                }
            } else {
                $contoh_kartu =  $data_asuransi->contoh_kartu;
            }

            // Handle struk_loa_loc
            $struk_loa_loc = $data_asuransi->struk_loa_loc; // Gunakan nilai lama sebagai default
            if (isset($_FILES['struk_loa_loc']) && $_FILES['struk_loa_loc']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['struk_loa_loc']['tmp_name'];
                $fileExtension = pathinfo($_FILES['struk_loa_loc']['name'], PATHINFO_EXTENSION);
                $fileNameLoaLoc = rand(100000, 999999) . '.' . $fileExtension;
                
                if (move_uploaded_file($fileTmpPath, $uploadFolder . $fileNameLoaLoc)) {
                    // Hapus file lama jika file baru berhasil diupload
                    if (file_exists($uploadFolder . $struk_loa_loc)) {
                        unlink($uploadFolder . $struk_loa_loc);
                    }
                    $struk_loa_loc = $fileNameLoaLoc;
                }
            }else{
                $struk_loa_loc = $data_asuransi->struk_loa_loc;
            }
            // var_dump($struk_loa_loc);
            // die();

            // Susun data untuk update
            $data = array(
                'id' => $data_asuransi->id,
                'payor_asuransi' => $payor_asuransi,
                'kode' => $kode,
                'produk' => $produk,
                'pelayanan_ri' => $pelayanan_ri,
                'pelayanan_rj' => $pelayanan_rj,
                'contoh_kartu' => $contoh_kartu, // Simpan file baru atau lama
                'call_center' => $call_center,
                'penulisan_invoice' => $penulisan_invoice,
                'struk_loa_loc' => $struk_loa_loc, // Simpan file baru atau lama
            );

            // Panggil fungsi updateOne
            $proc = $this->modelAsuransi->updateOne($data);
            // var_dump("masuk");
            // die();
            if ($proc) {
                $this->flash->setFlash('success', 'Data Asuransi berhasil diperbarui');
                header('Location: ' . BASEURL . 'admin');
            } else {
                unlink($uploadFolder . $fileNameKartu);
                unlink($uploadFolder . $fileNameLoaLoc);
                $this->flash->setFlash('warning', 'Data Asuransi gagal diperbarui');
                header('Location: ' . BASEURL . 'admin');
            }

            // header('Location: ' . BASEURL . 'admin');
            // exit;
        } else {
            header('Location: ' . BASEURL . 'admin');
            exit;
        }
    }

    public function hapus_asuransi($id)
    {
        $data_asuransi = $this->modelAsuransi->getOne($id);
        if(!$data_asuransi){
            $this->flash->setFlash('warning', 'Data Asuransi tidak ditemukan');
            header('Location: '.BASEURL.'admin');
        }

        $proc = $this->modelAsuransi->deleteOne($id);
        if ($proc) {
            $this->flash->setFlash('success', 'Data Asuransi berhasil dihapus');
            header('Location: ' . BASEURL . 'admin');
        } else {
            $this->flash->setFlash('warning', 'Data Asuransi gagal dihapus');
            header('Location: ' . BASEURL . 'admin');
        }
    }
}
