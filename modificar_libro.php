<?php

include "models/conexion.php";

$id = $_GET["id"];
$sql = $conexion->query("select * from libro where id_libro=$id");

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
            <h3 class="text-center text-secondary">Modificar Libro</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            include "controllers/controllers_modificar_libro.php";

            while ($datos = $sql->fetch_object()) { ?>

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título:</label>
                    <input type="text" class="form-control" name="titulo" value="<?= $datos->titulo ?>">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <input type="text" class="form-control" name="descripcion" value="<?= $datos->descripcion ?>">
                </div>
                <div class="mb-3">
                    <label for="año_publicacion" class="form-label">Año de Publicación:</label>
                    <input type="date" class="form-control" name="año_publicacion" value="<?= $datos->publicacion ?>" required>
                </div>

                <!-- Selección de Autor -->
                <div class="mb-3">
                    <label for="id_autor" class="form-label">Autor:</label>
                    <select name="id_autor" class="form-control" required>
                        <option value="">Seleccione un autor</option>
                        <?php
                        $consulta_autores = $conexion->query("SELECT id_autor, nombre_completo FROM autor");
                        while ($autor = $consulta_autores->fetch_assoc()) {
                            // Verifica si el autor actual está seleccionado
                            $selected = ($datos->id_autor == $autor['id_autor']) ? "selected" : "";
                            echo "<option value='" . $autor['id_autor'] . "' $selected>" . $autor['nombre_completo'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

               <!-- Selección de Género -->
            <div class="mb-3">
                <label for="id_genero" class="form-label">Género:</label>
                <select name="id_genero" class="form-control" required>
                    <option value="">Seleccione un género</option>
                    <?php
                    $consulta_generos = $conexion->query("SELECT id_genero, nombre FROM genero");
                    while ($genero = $consulta_generos->fetch_assoc()) {
                        // Verifica si el género actual está seleccionado
                        $selected = ($datos->id_genero == $genero['id_genero']) ? "selected" : "";
                        echo "<option value='" . $genero['id_genero'] . "' $selected>" . $genero['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <?php
            }

            ?>
            <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar Libro</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </div>
</body>

</html>