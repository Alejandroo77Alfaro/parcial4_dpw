<?php


if (!empty($_POST["btnmodificar"])) { // Verifica si el formulario fue enviado
    if (
        !empty($_POST["titulo"]) && !empty($_POST["descripcion"]) &&
        !empty($_POST["año_publicacion"]) && !empty($_POST["id_autor"]) &&
        !empty($_POST["id_genero"])
    ) {

        $id = $_POST["id"];
        $titulo = $_POST["titulo"];
        $descripcion = $_POST["descripcion"];
        $año_publicacion = $_POST["año_publicacion"];
        $id_autor = $_POST["id_autor"];
        $id_genero = $_POST["id_genero"];

        $sql = $conexion->query("update libro set titulo='$titulo',descripcion='$descripcion',año_publicacion='$año_publicacion', id_autor='$id_autor', id_genero='$id_genero' where id_libro=$id");

        if ($sql == 1) {
            header("Location: libros.php");
        } else {
            echo '<div class="alert alert-danger">error! al modificar el libro</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Campos vacíos</div>';
    }
}
