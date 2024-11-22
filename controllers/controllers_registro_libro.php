<?php

include "../models/conexion.php";
session_start(); // Inicia la sesión para manejar mensajes

if (!empty($_POST["btnregistrar"])) { // Verifica si el formulario fue enviado
    if (!empty($_POST["titulo"]) && !empty($_POST["descripcion"]) && 
        !empty($_POST["publicacion"]) && !empty($_POST["id_autor"]) && 
        !empty($_POST["id_genero"]) ) {
        
        $titulo = $_POST["titulo"];
        $descripcion = $_POST["descripcion"];
        $publicacion = $_POST["publicacion"];
        $id_autor = $_POST["id_autor"];
        $id_genero = $_POST["id_genero"];

        // Ejecuta la consulta
        $sql = $conexion->query("INSERT INTO libro(titulo, descripcion, año_publicacion, id_autor, id_genero) 
                                 VALUES('$titulo', '$descripcion', '$publicacion','$id_autor','$id_genero')");

        if ($sql == 1) {
            $_SESSION['mensaje'] = '<div class="alert alert-success">libro registrado correctamente!</div>';
        } else {
            $_SESSION['mensaje'] = '<div class="alert alert-danger">¡Error al registrar el libro!</div>';
        }
    } else {
        $_SESSION['mensaje'] = '<div class="alert alert-warning">¡Todos los campos son obligatorios!</div>';
    }

    // Redirige siempre al index.php
    header("Location: ../libros.php");
    exit;
}
?>
