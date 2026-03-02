<?php
// config/Database.php
// PATRÓN SINGLETON — garantiza una única conexión a la base de datos

class Database {
    private static $instance = null;
    private $connection;

    // Constructor privado: nadie puede hacer "new Database()" desde afuera
    private function __construct() {
        $this->connection = new PDO(
            "mysql:host=localhost;dbname=crudphp1;charset=utf8mb4",
            "root",
            "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    // Método estático que devuelve SIEMPRE la misma instancia
    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
}
?>
