<?php

include "models/conexion.php";

$id = $_GET["id"];
$sql = $conexion->query("select * from autor where id_autor=$id");

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
            <h3 class="text-center text-secondary">Modificar Autor</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            include "controllers/controllers_modificar_autor.php";

            while ($datos = $sql->fetch_object()) { ?>

                <div class="mb-3">
                    <label for="nombre_completo" class="form-label">Nombre completo:</label>
                    <input type="text" class="form-control" name="nombre_completo" value="<?=$datos->nombre_completo?>">
                </div>
                <div class="mb-3">
                    <label for="fecha_cumpleaños" class="form-label">Fecha de cumpleaños:</label>
                    <input type="date" class="form-control" name="fecha_cumpleaños" value="<?=$datos->fecha_cumpleaños?>">
                </div>
                <div class="mb-3">
                    <label for="fecha_muerte" class="form-label">Fecha de muerte:</label>
                    <input type="date" class="form-control" name="fecha_muerte" value="<?=$datos->fecha_muerte?>">
                </div>
            <?php
            }

            ?>

            <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar Autor</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </div>
</body>

</html>