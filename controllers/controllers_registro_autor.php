<?php

include "../models/conexion.php";
session_start(); // Inicia la sesión para manejar mensajes

if (!empty($_POST["btnregistrar"])) { // Verifica si el formulario fue enviado
    if (!empty($_POST["nombre_completo"]) && !empty($_POST["fecha_cumpleaños"]) && 
        !empty($_POST["fecha_muerte"])) {
        
        $nombre_completo = $_POST["nombre_completo"];
        $fecha_cumpleaños = $_POST["fecha_cumpleaños"];
        $fecha_muerte = $_POST["fecha_muerte"];

        // Ejecuta la consulta
        $sql = $conexion->query("INSERT INTO autor(nombre_completo, fecha_cumpleaños, fecha_muerte) 
                                 VALUES('$nombre_completo', '$fecha_cumpleaños', '$fecha_muerte')");

        if ($sql == 1) {
            $_SESSION['mensaje'] = '<div class="alert alert-success">Autor registrado correctamente!</div>';
        } else {
            $_SESSION['mensaje'] = '<div class="alert alert-danger">¡Error al registrar la autor!</div>';
        }
    } else {
        $_SESSION['mensaje'] = '<div class="alert alert-warning">¡Todos los campos son obligatorios!</div>';
    }

    // Redirige siempre al index.php
    header("Location: ../autor.php");
    exit;
}
?>
