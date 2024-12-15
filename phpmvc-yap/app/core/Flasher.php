<?php
class Flasher
{
    public static function setFlash($type, $message)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public static function getFlash()
    {
        if (isset($_SESSION['flash'])) {
            echo '
            <div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
                <strong>' . $_SESSION['flash']['message'] . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            unset($_SESSION['flash']);
        }
    }

    public static function setSessionLogin($user)
    {
        $_SESSION['user'] = [
            'data' => $user,
        ];
    }

    public static function setSessionLogout()
    {
        unset($_SESSION['user']);
    }
}
