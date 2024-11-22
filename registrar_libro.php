
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
        <form class="col-4 p-3 m-auto" method="POST" action="controllers/controllers_registro_libro.php">
            <h3 class="text-center text-secondary">Registro de Libros</h3>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" class="form-control" name="descripcion">
            </div>
            <div class="mb-3">
                <label for="publicacion" class="form-label">Año de Publicación:</label>
                <input type="date" class="form-control" name="publicacion">
            </div>

             <!-- Selección de Autor -->
             <div class="mb-3">
                <label for="id_autor" class="form-label">Autor:</label>
                <select name="id_autor" class="form-control">
                    <option value="">Seleccione un autor</option>
                    <?php
                    $consulta_autores = $conexion->query("SELECT id_autor, nombre_completo FROM autor");
                    while ($autor = $consulta_autores->fetch_assoc()) {
                        echo "<option value='" . $autor['id_autor'] . "'>" . $autor['nombre_completo'] . "</option>";
                    }
                    ?>
                </select>
            </div>

              <!-- Selección de Género -->
              <div class="mb-3">
                <label for="id_genero" class="form-label">Género:</label>
                <select name="id_genero" class="form-control">
                    <option value="">Seleccione un género</option>
                    <?php
                    $consulta_generos = $conexion->query("SELECT id_genero, nombre FROM genero");
                    while ($genero = $consulta_generos->fetch_assoc()) {
                        echo "<option value='" . $genero['id_genero'] . "'>" . $genero['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
            
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>