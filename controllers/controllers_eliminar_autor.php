<?php

if (!empty($_GET["id"])) {
    $id =  $_GET["id"];
    $sql = $conexion->query("delete from autor WHERE id_autor = $id");

} 

?>
