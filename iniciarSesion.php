<?php
session_start();
include "models/conexion.php";

if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $usuario = trim($_POST['usuario']);
    $clave = trim($_POST['clave']);

    if (empty($usuario)) {
        header("Location: index.php?error=El usuario es requerido");
        exit();
    } elseif (empty($clave)) {
        header("Location: index.php?error=La clave es requerida");
        exit();
    } else {
        // Consulta preparada
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ? AND clave = ?");
        
        if ($stmt === false) {
            die("Error en la consulta preparada: " . $conexion->error);
        }

        // Vincula los parámetros
        $stmt->bind_param("ss", $usuario, $clave);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $_SESSION['usuario'] = $row['usuario'];
            header("Location: autor.php");
            exit();
        } else {
            header("Location: index.php?error=El usuario o la clave son incorrectas");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
