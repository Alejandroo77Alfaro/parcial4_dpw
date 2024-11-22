<?php

include "models/conexion.php";

$id = $_GET["id"];
$sql = $conexion->query("select * from existencias where id_existencias=$id");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ff91c3d4ba.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container fluid row">
        <form class="col-4 p-3 m-auto" method="POST">
            <h3 class="text-center text-secondary">Modificar Existencias</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            include "controllers/controllers_modificar_existencias.php";

            while ($datos = $sql->fetch_object()) { ?>

                <!-- Selección de id libro -->
                <div class="mb-3">
                    <label for="id_libro" class="form-label">ID libro:</label>
                    <select name="id_libro" class="form-control">
                        <option value="">Seleccione un ID de libro</option>
                        <?php
                        // Realizamos la consulta para obtener los libros
                        $consulta_libros = $conexion->query("SELECT id_libro, titulo FROM libro");

                        // Iteramos sobre cada libro
                        while ($libro = $consulta_libros->fetch_assoc()) {
                            // Comprobamos si el id_libro del libro actual coincide con el id_libro del registro que estamos editando
                            $selected = ($libro['id_libro'] == $datos->id_libro) ? "selected" : "";

                            // Mostramos el option correspondiente, si coincide con el id_libro, agregamos "selected"
                            echo "<option value='" . $libro['id_libro'] . "' $selected>" . $libro['titulo'] . "</option>";
                        }
                        ?>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="total_existencias" class="form-label">Total existencias:</label>
                    <input type="text" class="form-control" name="total_existencias" value="<?= $datos->total_existencias ?>">
                </div>
                <div class="mb-3">
                    <label for="notas" class="form-label">Notas:</label>
                    <input type="text" class="form-control" name="notas" value="<?= $datos->notas ?>">
                </div>
                <div class="mb-3">
                    <label for="ultimo_inventario" class="form-label">Último inventario:</label>
                    <input type="date" class="form-control" name="ultimo_inventario" value="<?= $datos->ultimo_inventario ?>">
                </div>


            <?php
            }

            ?>
            <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar Existencia</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </div>
</body>

</html>