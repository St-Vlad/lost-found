<?php


namespace Core\form_cleaners;

class FormSanitizer
{
    public static function sanitizeFields(...$fields){
        foreach ($fields as $field){
            $field = trim($field);
            $field = filter_var($field, FILTER_SANITIZE_STRING);
        }
        return $fields;
    }
}