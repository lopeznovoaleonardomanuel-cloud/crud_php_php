<?php
// repository/PersonaRepository.php
// PATRÓN REPOSITORY — centraliza todas las consultas SQL del CRUD

require_once __DIR__ . '/../config/Database.php';

class PersonaRepository {
    private $db;

    public function __construct() {
        // Usa el Singleton para obtener la conexión
        $this->db = Database::getInstance()->getConnection();
    }

    // CREATE — registrar nueva persona
    public function registrar(array $datos): bool {
        $stmt = $this->db->prepare(
            "INSERT INTO persona (nombre, apellido, dni, fecha_nac, correo) 
             VALUES (:nombre, :apellido, :dni, :fecha_nac, :correo)"
        );
        return $stmt->execute([
            ':nombre'    => $datos['nombre'],
            ':apellido'  => $datos['apellido'],
            ':dni'       => $datos['dni'],
            ':fecha_nac' => $datos['fecha_nac'],
            ':correo'    => $datos['correo']
        ]);
    }

    // READ — listar todas las personas
    public function listar(): array {
        $stmt = $this->db->query("SELECT * FROM persona");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ — buscar persona por ID
    public function buscarPorId(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM persona WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    // UPDATE — actualizar persona por ID
    public function actualizar(int $id, array $datos): bool {
        $stmt = $this->db->prepare(
            "UPDATE persona 
             SET nombre=:nombre, apellido=:apellido, dni=:dni, 
                 fecha_nac=:fecha_nac, correo=:correo 
             WHERE id=:id"
        );
        return $stmt->execute([
            ':nombre'    => $datos['nombre'],
            ':apellido'  => $datos['apellido'],
            ':dni'       => $datos['dni'],
            ':fecha_nac' => $datos['fecha_nac'],
            ':correo'    => $datos['correo'],
            ':id'        => $id
        ]);
    }

    // DELETE — eliminar persona por ID
    public function eliminar(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM persona WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
?>
