<?php


if (!empty($_POST["btnmodificar"])) { // Verifica si el formulario fue enviado
    if (
        !empty($_POST["id_libro"]) && !empty($_POST["total_existencias"]) && 
        !empty($_POST["notas"]) && !empty($_POST["ultimo_inventario"])
    ) {

        $id = $_POST["id"];
        $id_libro = $_POST["id_libro"];
        $total_existencias = $_POST["total_existencias"];
        $notas = $_POST["notas"];
        $ultimo_inventario = $_POST["ultimo_inventario"];

        $sql = $conexion->query("update existencias set id_libro='$id_libro',total_existencias='$total_existencias',
        notas='$notas', ultimo_inventario='$ultimo_inventario' where id_existencias=$id");

        if ($sql == 1) {
            header("Location: existencias.php");
        } else {
            echo '<div class="alert alert-danger">error! al modificar la existencia</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Campos vacíos</div>';
    }
}
