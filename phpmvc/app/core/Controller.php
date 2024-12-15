<?php 

class Controller
{
    public function loadModel($model)
    {
        if (!file_exists('../app/models/'.$model.'.php')) {
            echo "File : " . '../app/models/'.$model.'.php Tidak ditemukan';
            die();
        }
        require_once '../app/models/'.$model.'.php';
        return new $model;
    }

    public function loadView($view, $data = array())
    {
        if (!file_exists('../app/views/'.$view.'.php')) {
            echo "File : " . '../app/views/'.$view.'.php Tidak ditemukan';
            die();
        }
        if (count($data)) {
            extract($data);
        }
        require_once '../app/views/'.$view.'.php';
    }
}
?>