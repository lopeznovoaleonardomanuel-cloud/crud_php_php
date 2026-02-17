<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud_PHP Practica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5c045f1e88.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center p-3">HOLA MUNDO</h1>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <h3 class="text center text-secondary">Registro de Personas</h3>
            <?php
            include "modelo/conexion.php";
            include "controlador/registro_persona.php";
            ?>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
             <input type="text" class="form-control" name="nombre">
  </div>
  <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellido de la persona</label>
             <input type="text" class="form-control" name="Apellido">
  </div>
  <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">DNI de la persona</label>
             <input type="text" class="form-control" name="dni">
  </div>
  <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
             <input type="date" class="form-control" name="fecha">
  </div>
  <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo</label>
             <input type="text" class="form-control" name="correo">
  </div>

  <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
</form>
    <div class="col 8 p-4">
    <table class="table">
    <thead class="bg-info">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRES</th>
      <th scope="col">APELLIDO</th>
      <th scope="col">FECHA DE NAC</th>
      <th scope="col">DNI</th>
      <th scope="col">CORREO</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "modelo/conexion.php";
    $sql= $conexion->query(" select * from persona ");
    while($datos=$sql->fetch_object()){ ?>
    <tr>
       <td><?=$datos->id ?></td>
      <td><?=$datos->nombre ?></td>
      <td><?=$datos->apellido ?></td>
      <td><?=$datos->fecha_nac ?></td>
      <td><?=$datos->dni ?></td>
      <td><?=$datos->correo ?></td>
      <td>
        <a href="" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
        <a href="" class="btn btn-small btn-danger"><i class="fa-solid fa-delete-left"></i></a>
      </td>
    </tr>
<?php }
?>
  </tbody>
</table>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>