<?php

namespace Project\Controllers;

use Core\Controller;
use Core\form_cleaners\FormSanitizer;
use Core\form_cleaners\FormValidator;
use Project\Models\Find;
use Project\Models\LogicFind;
use Project\Models\LogicLoss;
use Project\Models\Loss;

class PostController extends Controller
{
    private $errors = [];
    private $img = NULL;

    private $logicFind;
    private $logicLoss;

    public function __construct()
    {
        parent::__construct();
    }

    public function loss()
    {
        $this->title = "Форма заяви про втрату";

        if (isset($_POST['submit'])){
            $this->check_csrf();
            $this->logicLoss = new LogicLoss();
            $sanitizedFields = FormSanitizer::sanitizeFields($_POST['title'],
                                                             $_POST['additional-info'],
                                                             $_POST['reward'],
                                                             $_POST['place-of-loss']);
            $this->errors = FormValidator::validateLossForm($sanitizedFields);

            if(!empty($_FILES['image']['tmp_name'])){
                $this->img = file_get_contents($_FILES['image']['tmp_name']);
                $this->checkFileExtension();
            }

            if (!$this->errors){
                $loss = new Loss($sanitizedFields[0],
                    $sanitizedFields[1],
                    $sanitizedFields[2],
                    $sanitizedFields[3],
                    $this->img);
                $this->logicLoss->addLoss($loss);
            }
        }
        return $this->render('posts/loss');
    }

    public function find()
    {
        $this->title = "Форма заяви про знахідку";

        if (isset($_POST['submit'])){
            $this->check_csrf();
            $this->logicFind = new LogicFind();

            $sanitizedFields = FormSanitizer::sanitizeFields($_POST['title'],
                $_POST['additional-info'],
                $_POST['place-of-find']);
            $this->errors = FormValidator::validateFindsForm($sanitizedFields);

            if(!empty($_FILES['image']['tmp_name'])){
                $this->img = file_get_contents($_FILES['image']['tmp_name']);
                $this->checkFileExtension();
            }
            if (!$this->errors){
                $find = new Find($sanitizedFields[0],
                                 $sanitizedFields[1],
                                 $sanitizedFields[2],
                                 $this->img);
                $this->logicFind->addFind($find);
            }
        }
        return $this->render('posts/find', ['errors' => $this->errors]);
    }

    private function checkFileExtension(){
        $imgExtension = $this->getFileExtension();
        if ($imgExtension !== "jpg" && $imgExtension !== "png"){
            $this->errors[] = "Файл повинен бути картинкой формату .jpg або .png";
        }
    }

    private function getFileExtension(){
        $extension = explode('/', $_FILES['image']['type']);
        return $extension[1];
    }
}