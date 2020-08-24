<?php

namespace Core;

use PDO;

class Model{
    protected static $pdo;

    public function __construct()
    {
        if (!self::$pdo){
            $dsn = "mysql:host=" .DB_HOST. "; dbname=" .DB_NAME;
            self::$pdo = new PDO($dsn, DB_ROOT, DB_PASS,
                                  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
    }
}