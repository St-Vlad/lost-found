<?php

namespace Project\Models;

use Core\Model;

class User extends Model
{
    private $email;
    private $password;
    private $salt;
    //to do
    private $emailToken;

    public function __construct($email, $password)
    {
        parent::__construct();
        $this->email = $email;
        $this->password = hash('sha512', $password);
    }

    public function register(){
        $hashedPass = $this->getHashedPassword();
        $stmt = parent::$pdo->prepare("INSERT INTO `users`(`user_id`, `email`, `password`, `salt`) 
                                                VALUES (NULL, :email, :password, :salt)");
        $stmt->execute([':email' => $this->email, ':password' => $hashedPass, ':salt' => $this->salt]);
        return true;
    }

    public function login(){
        $hashedPass = $this->getHashedPassword();
        $stmt = parent::$pdo->prepare("SELECT user_id, email, password FROM `users` 
                                    WHERE `email`=:email AND `password`=:password");
        $stmt->execute([':email' => $this->email, ':password' => $hashedPass]);
        $user = $stmt->fetch();
        if ($user){
            return $user['user_id'];
        }
    }
/*
    public static function checkAdmin(){

    }*/

    public function authUser($user_id){
        $_SESSION['user_id'] = $user_id;
    }

    public function checkAuthUser($user_id){
        if(isset($_SESSION['user_id'])){
            return true;
        }
        else{
            header("Location: /user/login");
        }
    }

    private function getHashedPassword(){
        return hash("sha512", $this->password .$this->getSalt($this->email));
    }

    private function getSalt($email){
        $this->salt = substr(hash('sha512', $email), 0 ,10);
    }
}