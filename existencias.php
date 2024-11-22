<?php
include "models/conexion.php";
session_start(); // Inicia la sesión para mensajes y datos

// Consulta para mostrar las personas registradas
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <script>
        function eliminar() {
            var respuesta = confirm("¿Estas seguro de eliminar?");
            return respuesta;
        }
    </script>

    <div class="container mt-3">
        <div>
            <?php
            include "models/conexion.php";
            include "controllers/controllers_eliminar_existencias.php";

            ?>
        </div>
        <div class="row">
            <div class="col-auto">
                <a href="registrar_existencias.php" class="btn btn-primary">Registrar Nueva existencia</a>
            </div>
            <div class="col-auto">
                <a href="autor.php" class="btn btn-link">Regresar</a>
            </div>

            </div>
        </div>

        <br>
        <!-- Tabla de personas registradas -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Existencia</th>
                    <th>ID Libro</th>
                    <th>Total Existencias</th>
                    <th>Notas</th>
                    <th>Último inventario</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = $conexion->query("SELECT * FROM existencias");
                while ($datos = $sql->fetch_object()): ?>
                    <tr>
                        <td><?= $datos->id_existencias ?></td>
                        <td><?= $datos->id_libro ?></td>
                        <td><?= $datos->total_existencias ?></td>
                        <td><?= $datos->notas ?></td>
                        <td><?= $datos->ultimo_inventario ?></td>
                        <td>
                            <!-- Botón Modificar -->
                            <a href="modificar_existencias.php?id=<?= $datos->id_existencias ?>" class="btn btn-small btn-warning">
                            <i class="fa-solid fa-file-pen"></i>
                            </a>

                            <!-- Botón Eliminar -->
                            <a onclick="return eliminar()" href="existencias.php?id=<?= $datos->id_existencias ?>" class="btn btn-small btn-danger" onclick="return confirm('¿Estás seguro de eliminar a esta existencia?')">
                            <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ff91c3d4ba.js" crossorigin="anonymous"></script>
</body>

</html>