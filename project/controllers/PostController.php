<?php

namespace Project\Controllers;

use Core\Controller;
use Core\form_cleaners\FormSanitizer;
use Core\form_cleaners\FormValidator;
use Project\Models\Find;
use Project\Models\Loss;

class PostController extends Controller
{
    private $errors = [];
    private $img = NULL;

    public function loss()
    {
        $this->title = "Форма заяви про втрату";

        if (isset($_POST['submit'])){
            $this->check_csrf();

            $sanitizedFields = FormSanitizer::sanitizeFields($_POST['title'],
                                                             $_POST['additional-info'],
                                                             $_POST['reward'],
                                                             $_POST['place-of-loss']);
            $this->errors = FormValidator::validateLossForm($sanitizedFields);

            if(!empty($_FILES['image']['tmp_name'])){
                $this->img = file_get_contents($_FILES['image']['tmp_name']);
            }

            if (!$this->errors){
                $loss = new Loss($sanitizedFields[0],
                    $sanitizedFields[1],
                    $sanitizedFields[2],
                    $sanitizedFields[3],
                    $this->img);
                $loss->addLoss();
            }
        }
        return $this->render('posts/loss');
    }

    public function find()
    {
        $this->title = "Форма заяви про знахідку";

        if (isset($_POST['submit'])){
            $this->check_csrf();

            $sanitizedFields = FormSanitizer::sanitizeFields($_POST['title'],
                $_POST['additional-info'],
                $_POST['place-of-find']);
            $this->errors = FormValidator::validateFindsForm($sanitizedFields);

            if(!empty($_FILES['image']['tmp_name'])){
                $this->img = file_get_contents($_FILES['image']['tmp_name']);
            }
            if (!$this->errors){
                $find = new Find($sanitizedFields[0],
                    $sanitizedFields[1],
                    $sanitizedFields[2],
                    $this->img);
                $find->addFind();
            }
        }
        return $this->render('posts/find');
    }
}