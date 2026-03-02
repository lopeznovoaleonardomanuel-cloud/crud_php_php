<?php
// factory/PersonaFactory.php
// PATRÓN FACTORY — centraliza la creación de datos de Persona

class PersonaFactory {

    // Construye un array de Persona desde el formulario HTML ($_POST)
    public static function crearDesdeFormulario(array $post): array {
        return [
            'nombre'    => trim($post['nombre']    ?? ''),
            'apellido'  => trim($post['apellido']  ?? ''),
            'dni'       => trim($post['dni']       ?? ''),
            'fecha_nac' => trim($post['fecha_nac'] ?? ''),
            'correo'    => trim($post['correo']    ?? '')
        ];
    }

    // Construye un array de Persona desde un resultado de la base de datos
    public static function crearDesdeBD(array $fila): array {
        return [
            'id'        => (int) $fila['id'],
            'nombre'    => $fila['nombre'],
            'apellido'  => $fila['apellido'],
            'dni'       => $fila['dni'],
            'fecha_nac' => $fila['fecha_nac'],
            'correo'    => $fila['correo']
        ];
    }
}
?>
