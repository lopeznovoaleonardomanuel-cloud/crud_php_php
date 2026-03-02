<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h2 class="mb-4">📋 CRUD Persona — Patrones de Diseño</h2>

    <?php require_once 'controlador/registro_persona.php'; ?>

    <!-- FORMULARIO REGISTRO / EDICIÓN -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Registrar / Editar Persona</div>
        <div class="card-body">
            <form method="POST">
                <input type="hidden" name="id" id="id">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" maxlength="50">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" maxlength="50">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">DNI</label>
                        <input type="text" name="dni" id="dni" class="form-control" maxlength="8">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nac" id="fecha_nac" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Correo</label>
                        <input type="email" name="correo" id="correo" class="form-control" maxlength="100">
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" name="btnregistrar" class="btn btn-success" id="btnRegistrar">
                        ➕ Registrar
                    </button>
                    <button type="submit" name="btnactualizar" class="btn btn-warning d-none" id="btnActualizar">
                        ✏️ Actualizar
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="limpiarFormulario()">
                        🔄 Limpiar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- TABLA DE PERSONAS -->
    <div class="card">
        <div class="card-header bg-dark text-white">Lista de Personas</div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Fecha Nac.</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($personas)): ?>
                        <?php foreach ($personas as $p): ?>
                            <?php $persona = \PersonaFactory::crearDesdeBD($p); ?>
                            <tr>
                                <td><?= $persona['id'] ?></td>
                                <td><?= htmlspecialchars($persona['nombre']) ?></td>
                                <td><?= htmlspecialchars($persona['apellido']) ?></td>
                                <td><?= htmlspecialchars($persona['dni']) ?></td>
                                <td><?= htmlspecialchars($persona['fecha_nac']) ?></td>
                                <td><?= htmlspecialchars($persona['correo']) ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm"
                                        onclick="cargarEdicion(
                                            <?= $persona['id'] ?>,
                                            '<?= addslashes($persona['nombre']) ?>',
                                            '<?= addslashes($persona['apellido']) ?>',
                                            '<?= addslashes($persona['dni']) ?>',
                                            '<?= $persona['fecha_nac'] ?>',
                                            '<?= addslashes($persona['correo']) ?>'
                                        )">✏️ Editar</button>
                                    <a href="?eliminar=<?= $persona['id'] ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('¿Eliminar esta persona?')">
                                        🗑️ Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted py-3">No hay personas registradas</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Nota de patrones aplicados -->
    <div class="mt-4 p-3 bg-white border rounded">
        <h6>🏗️ Patrones de diseño aplicados:</h6>
        <ul class="mb-0">
            <li><strong>Singleton</strong> — <code>config/Database.php</code>: una única conexión PDO a la BD</li>
            <li><strong>Repository</strong> — <code>repository/PersonaRepository.php</code>: todo el SQL centralizado</li>
            <li><strong>Factory</strong> — <code>factory/PersonaFactory.php</code>: construcción de datos de Persona</li>
        </ul>
    </div>
</div>

<script>
function cargarEdicion(id, nombre, apellido, dni, fecha_nac, correo) {
    document.getElementById('id').value       = id;
    document.getElementById('nombre').value   = nombre;
    document.getElementById('apellido').value = apellido;
    document.getElementById('dni').value      = dni;
    document.getElementById('fecha_nac').value= fecha_nac;
    document.getElementById('correo').value   = correo;

    document.getElementById('btnRegistrar').classList.add('d-none');
    document.getElementById('btnActualizar').classList.remove('d-none');
    window.scrollTo(0, 0);
}

function limpiarFormulario() {
    document.getElementById('id').value        = '';
    document.getElementById('nombre').value    = '';
    document.getElementById('apellido').value  = '';
    document.getElementById('dni').value       = '';
    document.getElementById('fecha_nac').value = '';
    document.getElementById('correo').value    = '';

    document.getElementById('btnRegistrar').classList.remove('d-none');
    document.getElementById('btnActualizar').classList.add('d-none');
}
</script>

</body>
</html>
