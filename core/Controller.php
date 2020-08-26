<?php

namespace Core;

class Controller
{
    protected $layout = 'main';
    protected $title = 'Головна';
    protected $CSRFtoken = '';

    public function __construct()
    {
        if (!isset($_SESSION['CSRFtoken'])){
            $this->CSRFtoken = $this->getCSRFtoken();
            $_SESSION['CSRFtoken'] = $this->CSRFtoken;
        }
    }

    protected function render($view, $data = []){
        return new Page($this->layout, $this->title, $view, $data);
    }

    protected function getCSRFtoken(){
        return $this->CSRFtoken = hash('sha256', $this->getRandomStr());
    }

    private function getRandomStr(){
        return substr( str_shuffle( 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789' ), 0, 10 );
    }

    protected function check_csrf() {
        if (empty($_POST['CSRFtoken']) || $_POST['CSRFtoken'] !== $_SESSION['CSRFtoken']) {
            die("wrong csrf token");
        }
    }
}