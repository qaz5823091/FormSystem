<?php

namespace App\Models;

use PDO;
use PDOException;

class Database
{
    private static PDO $connect;

    public static function connect(): PDO | null
    {
        if (!empty(self::$connect)) {
            return self::$connect;
        } else {
            try {
                $hostname = 'localhost';
                $dbname = 'form_system';
                $username = 'form_system';
                $password = 'Ibbf)hE9MzdSeFF5';

                self::$connect = new PDO(
                    'mysql: host='.$hostname.';dbname='.$dbname,
                    $username,
                    $password
                );

                return self::$connect;
            } catch (PDOException $error) {
                echo 'Connected Fail: '.$error->getMessage();

                return null;
            }
        }
    }
}
