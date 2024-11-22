<?php


if (!empty($_POST["btnmodificar"])) {
    if (
        !empty($_POST["nombre_completo"]) && !empty($_POST["fecha_cumpleaños"]) 
        && !empty($_POST["fecha_muerte"])
        ) {
            
            $id = $_POST["id"];
            $nombre_completo = $_POST["nombre_completo"];
            $fecha_cumpleaños = $_POST["fecha_cumpleaños"];
            $fecha_muerte = $_POST["fecha_muerte"];

            $sql = $conexion->query("update autor set nombre_completo='$nombre_completo',fecha_cumpleaños='$fecha_cumpleaños',fecha_muerte='$fecha_muerte' where id_autor=$id");
            
            if ($sql==1) {
                header("Location: autor.php");
            } else {
                echo '<div class="alert alert-danger">error! al modificar autor</div>';
            }

    }else{
        echo '<div class="alert alert-warning">Campos vacíos</div>';
    }
}
