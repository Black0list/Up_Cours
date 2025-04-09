<?php

namespace App\Core\config;

use PDO;
use PDOException;

class Database {
    private static $connection;
    private static $instance;

    private function __construct() {
        $servername = $_ENV['DB_HOST'];
        $dbname     = $_ENV['DB_NAME'];
        $username   = $_ENV['DB_USER'];
        $password   = $_ENV['DB_PASS'];

        if (!self::$connection) {
            try {
                self::$connection = new PDO(
                    "mysql:host=$servername;dbname=$dbname;charset=utf8",
                    $username,
                    $password
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self;
        }
<<<<<<< HEAD
        return self::$instance;
    }

    public function getConnection() {
        return self::$connection;
    }
}
=======
            return self::$instance;
        }
        
        public function getConnection(){
            return self::$connection;
        }
}
>>>>>>> 387f45d952c734e19a6d96f5bb591accb1827fdf
