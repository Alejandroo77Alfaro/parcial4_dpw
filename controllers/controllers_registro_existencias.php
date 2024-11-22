<?php

include "../models/conexion.php";
session_start(); // Inicia la sesión para manejar mensajes

if (!empty($_POST["btnregistrar"])) { // Verifica si el formulario fue enviado
    if (!empty($_POST["id_libro"]) && !empty($_POST["total_existencias"]) && 
        !empty($_POST["notas"]) && !empty($_POST["ultimo_inventario"])) {
        
        $id_libro = $_POST["id_libro"];
        $total_existencias = $_POST["total_existencias"];
        $notas = $_POST["notas"];
        $ultimo_inventario = $_POST["ultimo_inventario"];

        // Ejecuta la consulta
        $sql = $conexion->query("INSERT INTO existencias(id_libro, total_existencias, notas, ultimo_inventario) 
                                 VALUES('$id_libro', '$total_existencias', '$notas','$ultimo_inventario')");

        if ($sql == 1) {
            $_SESSION['mensaje'] = '<div class="alert alert-success">existencia registrada correctamente!</div>';
        } else {
            $_SESSION['mensaje'] = '<div class="alert alert-danger">¡Error al registrar la existencia!</div>';
        }
    } else {
        $_SESSION['mensaje'] = '<div class="alert alert-warning">¡Todos los campos son obligatorios!</div>';
    }

    // Redirige siempre al index.php
    header("Location: ../existencias.php");
    exit;
}
?>
