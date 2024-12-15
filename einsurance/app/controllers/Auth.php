<?php

class Auth extends Controller
{

    private $modelUser;
    private $flash;

    public function __construct()
    {
        $this->modelUser = $this->loadModel('ModelUser');
        $this->flash = new Flasher();
    }


    public function index()
    {
        $data = array(
            'title' => 'Data Asuransi',
        );

        $this->loadView('templates/header', $data);
        $this->loadView('templates/navbar');
        $this->loadView('auth/login', $data);
        $this->loadView('templates/footer');
    }

    public function login()
    {
        $data_admin = $this->modelUser->checkAdmin();
        if(count($data_admin) == 0){
            header('Location: ' . BASEURL . 'auth/register');
        }
        $data = array(
            'title' => 'Login Admin',
        );

        $this->loadView('templates/header', $data);
        $this->loadView('templates/navbar');
        $this->loadView('auth/login', $data);
        $this->loadView('templates/footer');
    }

    public function register()
    {
        $data_admin = $this->modelUser->checkAdmin();
        if(count($data_admin) >= 0){
            $this->flash->setFlash('warning', 'Data admin sudah ada');
            header('Location: ' . BASEURL . 'auth/login');
        }

        $data = array(
            'title' => 'Register Admin',
        );

        $this->loadView('templates/header', $data);
        $this->loadView('templates/navbar');
        $this->loadView('auth/register', $data);
        $this->loadView('templates/footer');
    }

    public function register_submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            header('Location: ' . BASEURL . 'auth/register');
        }

        $data = array(
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
            'role' => 'admin',
        );

        $proc = $this->modelUser->createOne($data);

        if ($proc) {
            $this->flash->setFlash('success', 'Sukses Register');
            header('Location: ' . BASEURL . 'auth/login');
        } else {
            $this->flash->setFlash('warning', 'Gagal Register');
            header('Location: ' . BASEURL . 'auth/register');
        }
    }


    public function login_submit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            header('Location: ' . BASEURL . 'auth/login');
            exit;
        }

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $user = $this->modelUser->checkUsername($username);

        // Cek apakah email terdaftar
        if (!$user) {
            $this->flash->setFlash('warning', 'Username tidak terdaftar');
            header('Location: ' . BASEURL . 'auth/login');
            exit;
        }

        // Verifikasi password
        if ($password !== $user->password) {
            $this->flash->setFlash('warning', 'Password salah');
            header('Location: ' . BASEURL . 'auth/login');
            exit;
        }

        // Update `last_login` di database
        $this->modelUser->updateLastLogin($user->id);

        // Set session untuk login
        $_SESSION['user'] = array(
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
            'role' => $user->role,
        );

        // Login berhasil
        $this->flash->setFlash('success', 'Sukses Login');
        header('Location: ' . BASEURL . 'admin');
        exit;
    }

    public function logout()
    {
        $this->flash->setSessionLogout();
        $this->flash->setFlash('success', 'Sukses Logout');
        
        header('Location: ' . BASEURL . 'auth/login');
    }
}
