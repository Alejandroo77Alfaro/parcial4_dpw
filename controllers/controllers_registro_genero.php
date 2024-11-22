<?php

include "../models/conexion.php";
session_start(); // Inicia la sesión para manejar mensajes

if (!empty($_POST["btnregistrar"])) { // Verifica si el formulario fue enviado
    if (!empty($_POST["nombre"])) {
        
        $nombre = $_POST["nombre"];

        // Ejecuta la consulta
        $sql = $conexion->query("INSERT INTO genero(nombre) 
                                 VALUES('$nombre')");

        if ($sql == 1) {
            $_SESSION['mensaje'] = '<div class="alert alert-success">Género registrado correctamente!</div>';
        } else {
            $_SESSION['mensaje'] = '<div class="alert alert-danger">¡Error al registrar la género!</div>';
        }
    } else {
        $_SESSION['mensaje'] = '<div class="alert alert-warning">¡Todos los campos son obligatorios!</div>';
    }

    // Redirige siempre al index.php
    header("Location: ../genero.php");
    exit;
}
?>
