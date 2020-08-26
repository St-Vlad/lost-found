<?php

namespace Project\Controllers;
use Core\Controller;
use Core\form_cleaners\FormSanitizer;
use Core\form_cleaners\FormValidator;
use Project\Models\User;

class UserController extends Controller {

    private $errors = [];

    public function login(){
        $this->layout = "auth";
        $this->title = "Увійти";

        if (isset($_POST['submit'])){
            $this->check_csrf();

            $sanitizedFields = FormSanitizer::sanitizeFields($_POST['email'],
                                                             $_POST['password']);
            $this->errors = FormValidator::validateLoginForm($sanitizedFields);

            if (!$this->errors){
                $user = new User($sanitizedFields[0], $sanitizedFields[1]);
                $user_id = $user->login();

                if (!$user_id){
                    $this->errors[] = "Неправильні дані для входу";
                }
                else{
                    $user->authUser($user_id);
                }
            }
        }
        return $this->render('user/login', ['errors' => $this->errors]);
    }

    public function register(){
        $this->layout = "auth";
        $this->title = "Зареєструватися";

        if (isset($_POST['submit'])){
            $this->check_csrf();
            $sanitizedFields = FormSanitizer::sanitizeFields($_POST['email'],
                                                             $_POST['password'],
                                                             $_POST['password-repeat']);
            $this->errors = FormValidator::validateRegistrationForm($sanitizedFields);

            if (!$this->errors){
                $user = new User($sanitizedFields[0], $sanitizedFields[1]);
                $user->register();
                header("Location: /");
            }
        }
        return $this->render('user/register', ['errors' => $this->errors]);
    }

    public function logout(){
        unset($_SESSION['user_id']);
        header("Location: /");
    }
}