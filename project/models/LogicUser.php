<?php

namespace Project\Models;

use Core\Model;

class LogicUser extends Model
{
    private $salt;
    //to do
    private $emailToken;

    public function __construct()
    {
        parent::__construct();
    }

    public function register(User $user){
        $hashedPass = $this->getHashedPassword($user->getEmail(), $user->getPassword());
        $stmt = parent::$pdo->prepare("INSERT INTO `users`(`user_id`, `email`, `password`, `salt`) 
                                                VALUES (NULL, :email, :password, :salt)");
        $stmt->execute([':email' => $user->getEmail(), ':password' => $hashedPass, ':salt' => $this->salt]);
        return true;
    }

    public function login(User $user){
        $hashedPass = $this->getHashedPassword($user->getEmail(), $user->getPassword());
        $stmt = parent::$pdo->prepare("SELECT user_id, email, password FROM `users` 
                                    WHERE `email`=:email AND `password`=:password");
        $stmt->execute([':email' => $user->getEmail(), ':password' => $hashedPass]);
        $result = $stmt->fetch();
        if ($result){
            return $result['user_id'];
        }
    }

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

    private function getHashedPassword($email, $password){
        return hash("sha512", $password .$this->getSalt($email));
    }

    private function getSalt($email){
        $this->salt = substr(hash('sha512', $email), 0 ,10);
    }
}