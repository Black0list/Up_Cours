<?php 

namespace App\Core\config;

use PDO;
use PDOException;

class Database {
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "upcours_database";
    private static $connection;
    private static $instance;


    private function __construct(){
        if (!self::$connection) {
            try {
                self::$connection = new PDO(
                    "mysql:host=" . self::$servername . 
                    ";dbname=" . self::$dbname . 
                    ";charset=UTF8",
                    self::$username,
                    self::$password
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        
    }

    public static function getInstance() {
        if(!self::$instance){
            self::$instance = new self;
        }
            return self::$instance;
        }
        
        public function getConnection(){
            return self::$connection;
        }
}