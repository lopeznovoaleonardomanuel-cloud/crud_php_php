<?php
// controlador/registro_persona.php
// Controlador de registro — usa Factory + Repository

require_once __DIR__ . '/../repository/PersonaRepository.php';
require_once __DIR__ . '/../factory/PersonaFactory.php';

$repo = new PersonaRepository();

// CREATE — Registrar persona
if (!empty($_POST["btnregistrar"])) {
    if (
        !empty($_POST["nombre"])    &&
        !empty($_POST["apellido"])  &&
        !empty($_POST["fecha_nac"]) &&
        !empty($_POST["dni"])       &&
        !empty($_POST["correo"])
    ) {
        // Factory limpia y construye los datos
        $datos = PersonaFactory::crearDesdeFormulario($_POST);

        // Repository ejecuta el INSERT
        $resultado = $repo->registrar($datos);

        if ($resultado) {
            echo '<div class="alert alert-success">Persona registrada correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar persona</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Algunos campos están vacíos</div>';
    }
}

// UPDATE — Actualizar persona
if (!empty($_POST["btnactualizar"])) {
    if (
        !empty($_POST["id"])        &&
        !empty($_POST["nombre"])    &&
        !empty($_POST["apellido"])  &&
        !empty($_POST["fecha_nac"]) &&
        !empty($_POST["dni"])       &&
        !empty($_POST["correo"])
    ) {
        $datos = PersonaFactory::crearDesdeFormulario($_POST);
        $resultado = $repo->actualizar((int)$_POST["id"], $datos);

        if ($resultado) {
            echo '<div class="alert alert-success">Persona actualizada correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al actualizar persona</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Algunos campos están vacíos</div>';
    }
}

// DELETE — Eliminar persona
if (!empty($_GET["eliminar"])) {
    $resultado = $repo->eliminar((int)$_GET["eliminar"]);

    if ($resultado) {
        echo '<div class="alert alert-success">Persona eliminada correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar persona</div>';
    }
}

// READ — Listar todas las personas
$personas = $repo->listar();
?>
