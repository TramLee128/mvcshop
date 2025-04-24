<?php
class Database
{
    public static $connection;

    public static function connect()
    {
        if (!self::$connection) {
            $config = require __DIR__ . '/../config.php';
            $db = $config['db'];

            try {
                self::$connection = self::$connection = new PDO("mysql:host=127.0.0.1;dbname=ProductDB", "root", "");

                // self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
