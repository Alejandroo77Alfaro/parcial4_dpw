<?php


if (!empty($_POST["btnmodificar"])) {
    if (
        !empty($_POST["nombre"])
        ) {
            
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];


            $sql = $conexion->query("update genero set nombre='$nombre' where id_genero=$id");
            
            if ($sql==1) {
                header("Location: genero.php");
            } else {
                echo '<div class="alert alert-danger">error! al modificar género</div>';
            }

    }else{
        echo '<div class="alert alert-warning">Campos vacíos</div>';
    }
}
