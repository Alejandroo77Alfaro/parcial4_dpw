
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
        <form class="col-4 p-3 m-auto" method="POST" action="controllers/controllers_registro_autor.php">
            <h3 class="text-center text-secondary">Registro de autores</h3>
            <div class="mb-3">
                <label for="nombre_completo" class="form-label">Nombre completo:</label>
                <input type="text" class="form-control" name="nombre_completo">
            </div>
            <div class="mb-3">
                <label for="fecha_cumpleaños" class="form-label">Fecha de cumpleaños:</label>
                <input type="date" class="form-control" name="fecha_cumpleaños">
            </div>
            <div class="mb-3">
                <label for="fecha_muerte" class="form-label">Fecha de muerte:</label>
                <input type="date" class="form-control" name="fecha_muerte">
            </div>

            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>