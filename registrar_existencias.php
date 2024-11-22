<?php

include "models/conexion.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ff91c3d4ba.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container fluid row">
        <form class="col-4 p-3 m-auto" method="POST" action="controllers/controllers_registro_existencias.php">
            <h3 class="text-center text-secondary">Registro de existencias</h3>

            <div class="mb-3">
                <label for="total_existencias" class="form-label">Total existencias:</label>
                <input type="text" class="form-control" name="total_existencias">
            </div>
            <div class="mb-3">
                <label for="notas" class="form-label">Notas:</label>
                <input type="text" class="form-control" name="notas">
            </div>
            <div class="mb-3">
                <label for="ultimo_inventario" class="form-label">Último inventario:</label>
                <input type="date" class="form-control" name="ultimo_inventario">
            </div>

            <!-- Selección de id libro -->
            <div class="mb-3">
                <label for="id_libro" class="form-label">ID libro:</label>
                <select name="id_libro" class="form-control">
                    <option value="">Seleccione un ID de libro</option>
                    <?php
                    // Consultar todos los libros
                    $consulta_libros = $conexion->query("SELECT id_libro, titulo FROM libro");

                    // Iterar sobre los libros y mostrar cada uno como opción en el select
                    while ($libro = $consulta_libros->fetch_assoc()) {
                        // Crear una opción para cada libro
                        echo "<option value='" . $libro['id_libro'] . "'>" . $libro['titulo'] . "</option>";
                    }
                    ?>
                </select>
            </div>


            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>

        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>