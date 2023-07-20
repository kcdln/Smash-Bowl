<?php

class DBConnectionSingleton
{
    private static $instance = null;
    private $connection = null;

    /**
     * Constructor is private to prevent initialization of new instances with the "new" keyword
     */
     private function __construct() {
        // DEV configuration (TODO put these lines into a distinct configuration file)
        $host = '127.0.0.1';
        $dbName = 'smash_bowl';
        $username = 'root';
        $password = '';

        // Connection to the databse
        $this->connection = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * getInstance() is only one method which is called to initialize an instance of this class
     * It allows to generate a new instance only the first time then give the same each time
     */
    public static function getInstance(): DBConnectionSingleton {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }
}

/**
 * Just to test my class
 */
/* function testSingleton()
{
    $s1 = DBConnectionSingleton::getInstance();
    $s2 = DBConnectionSingleton::getInstance();
    if ($s1 === $s2) {
        echo "Singleton OK, same instance !";
    } else {
        echo "Singleton NOT ok, different instances...";
    }
}

testSingleton(); */