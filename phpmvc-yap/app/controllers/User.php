<?php
class User extends Controller
{
    private $modelKaryawan;
    private $flash;

    public function __construct()
    {
        $this->modelKaryawan = $this->loadModel('ModelKaryawan');
        $this->flash = new Flasher();
    }

    public function index()
    {
        $data = [
            'title'=> 'Login',
        ];
        $this->loadView('templates/header',$data);
        $this->loadView('templates/navbar',$data);
        $this->loadView('auth/login');
        $this->loadView('templates/footer');
    }

    public function register()
    {
        $data = [
            'title'=> 'Register',
        ];
        $this->loadView('templates/header',$data);
        $this->loadView('templates/navbar',$data);
        $this->loadView('auth/register');
        $this->loadView('templates/footer');
    }

    public function register_submit()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location : ' . BASEURL . 'user/register');
        }

        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'nama' => $_POST['nama'],
            'alamat' => $_POST['alamat'],
        ];

        $proc = $this->modelKaryawan->createOne($data);
        if ($proc) {
            $this->flash->setFlash('success', 'Sukses Register');
            header('Location: ' . BASEURL . 'user');
        } else {
            $this->flash->setFlash('warning', 'Gagal Register');
            header('Location: ' . BASEURL . 'user');
        }

    }

    public function login_submit()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . 'user');
        }

        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];
        $user = $this->modelKaryawan->checkEmail($data['email']);
        if ($user == false) {
            $this->flash->setFlash('warning', 'Email tidak terdaftar');
            header('Location: ' . BASEURL . 'user');
        }
        // cek password
        if ($data['password'] !== $user->password) {
            $this->flash->setFlash('warning', 'Pasword Salah');
            header('Location: ' . BASEURL . 'user');
        }

        $this->flash->setFlash('success', 'Sukses Login');
        $this->flash->setSessionLogin($user);
        header('Location: ' . BASEURL . 'karyawan');
    }

    public function logout()
    {
        $this->flash->setSessionLogout();
        $this->flash->setFlash('success', 'Sukses Logout');
        
        header('Location: ' . BASEURL . 'user');
    }



}
?>