<?php
if (!empty($_POST["btnregistrar"])) {

    if (
        !empty($_POST["nombre"]) &&
        !empty($_POST["apellido"]) &&
        !empty($_POST["fecha_nac"]) &&
        !empty($_POST["dni"]) &&
        !empty($_POST["correo"])
    ) {
        // Asignar variables
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $fecha = $_POST["fecha_nac"];
        $correo = $_POST["correo"];

        // Ejecutar consulta
        $sql = $conexion->query("INSERT INTO persona(nombre, apellido, dni, fecha_nac, correo) VALUES('$nombre', '$apellido', '$dni', '$fecha', '$correo')");

        if ($sql == 1){ 
            echo '<div class="alert alert-success">Persona registrada correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar persona</div>';
        }

    } else {
        echo '<div class="alert alert-warning">Algunos de los campos están vacíos</div>';
    }

}
?>
