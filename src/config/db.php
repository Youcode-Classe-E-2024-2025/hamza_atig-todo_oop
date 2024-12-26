<?php

class Database {
    private static ?PDO $instance = null;
    private const HOST = 'localhost';
    private const DB_NAME = 'taskflow';
    private const USERNAME = 'root';
    private const PASSWORD = '';

    public static function getInstance(): PDO {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    "mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME,
                    self::USERNAME,
                    self::PASSWORD
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
