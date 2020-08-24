<?php

namespace Project\Controllers;
use Core\Controller;
use Core\form_cleaners\FormSanitizer;
use Core\form_cleaners\FormValidator;
use Project\Models\User;

class UserController extends Controller {

    public function login(){
        $errors = [];
        $this->layout = "auth";
        $this->title = "Увійти";

        if (isset($_POST['submit'])){
            $this->check_csrf();

            $sanitizedFields = FormSanitizer::sanitizeFields($_POST['email'],
                                                             $_POST['password']);
            $errors = FormValidator::validateLoginForm($sanitizedFields);

            if (!$errors){
                $user = new User($sanitizedFields[0], $sanitizedFields[1]);
                $user_id = $user->login();

                if (!$user_id){
                    $errors[] = "Неправильні дані для входу";
                }
                else{
                    $user->authUser($user_id);
                }
            }
        }
        return $this->render('user/login', ['errors' => $errors]);
    }

    public function register(){
        $errors = [];
        $this->layout = "auth";
        $this->title = "Зареєструватися";

        if (isset($_POST['submit'])){
            $this->check_csrf();
            $sanitizedFields = FormSanitizer::sanitizeFields($_POST['email'],
                                                             $_POST['password'],
                                                             $_POST['password-repeat']);
            $errors = FormValidator::validateRegistrationForm($sanitizedFields);

            if (!$errors){
                $user = new User($sanitizedFields[0], $sanitizedFields[1]);
                $user->register();
                header("Location: /");
            }
        }
        return $this->render('user/register', ['errors' => $errors]);
    }

    public function logout(){
        unset($_SESSION['user_id']);
        header("Location: /");
    }

    private function check_csrf() {
        if (!$_POST['CSRFtoken'] || $_POST['CSRFtoken'] !== $_SESSION['CSRFtoken']) {
            die("wrong csrf token");
        }
    }
}