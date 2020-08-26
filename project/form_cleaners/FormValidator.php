<?php

namespace Core\form_cleaners;

class FormValidator
{
    private static $errors = [];

    public static function validateRegistrationForm(array $sanitizedFields){
        self::validateEmail($sanitizedFields[0]);
        self::validatePassword($sanitizedFields[1]);
        self::validatePasswordRepeat($sanitizedFields[1], $sanitizedFields[2]);
        return self::$errors;
    }

    public static function validateLoginForm(array $sanitizedFields){
        self::validateEmail($sanitizedFields[0]);
        self::validatePassword($sanitizedFields[1]);
        return self::$errors;
    }

    public static function validateLossForm(array  $sanitizedFields){
        self::validateTitle($sanitizedFields[0]);
        self::validateReward($sanitizedFields[2]);
        return self::$errors;
    }

    public static function validateFindsForm(array  $sanitizedFields){
        self::validateTitle($sanitizedFields[0]);
        self::validateReward($sanitizedFields[2]);
        return self::$errors;
    }

    private static function validateReward($reward){
        $pattern = "/[\+\-]+/";
        if (preg_match($pattern, $reward)){
            self::$errors[] = "Поле не може мати спеціальних символів";
        }
    }

    private static function validateTitle($title){
        $length = strlen($title);
        if ($length < 3 || $length > 50){
            self::$errors[] = "Назва втрати не може бути меншою за 3 або більшою за 50 символів";
        }
    }

    private static function validateEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            self::$errors[] = "Неправильний формат Email";
        }
    }

    private static function validatePassword($password){
        $length = strlen($password);
        if ($length < 10 || $length > 100){
            self::$errors[] = "Пароль не може бути більше ніж 100 символів або менше ніж 10 символів";
        }
    }

    private static function validatePasswordRepeat($password, $passwordRepeat){
        if ($password != $passwordRepeat){
            self::$errors[] = "Паролі не співпадають";
        }
    }
}