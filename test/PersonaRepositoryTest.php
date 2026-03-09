<?php
use PHPUnit\Framework\TestCase;

// Importar las clases necesarias basándose en tu estructura
require_once __DIR__ . '/../repository/PersonaRepository.php';
require_once __DIR__ . '/../factory/PersonaFactory.php';
require_once __DIR__ . '/../config/Database.php';

class PersonaRepositoryTest extends TestCase {
    private $repo;

    protected function setUp(): void {
        $this->repo = new PersonaRepository();
    }

    /**
     * Prueba la creación de una persona usando el Factory y el Repository
     */
    public function testRegistrarPersona() {
        $mockPost = [
            'nombre'    => 'Test',
            'apellido'  => 'Unitario',
            'dni'       => '99999999',
            'fecha_nac' => '1990-01-01',
            'correo'    => 'test@example.com',
            'categoria' => 'Admin',
            'estado'    => 'Activo'
        ];

        $datos = PersonaFactory::crearDesdeFormulario($mockPost);
        $resultado = $this->repo->registrar($datos);

        $this->assertTrue($resultado, "El registro falló en la base de datos.");
    }

    /**
     * Prueba que la función listar devuelva un array (aunque esté vacío)
     */
    public function testListarPersonas() {
        $lista = $this->repo->listar();
        $this->assertIsArray($lista);
    }

    /**
     * Prueba la obtención del total de registros para el Dashboard
     */
    public function testTotalRegistros() {
        $total = $this->repo->totalRegistros();
        $this->assertGreaterThanOrEqual(0, $total);
    }
}