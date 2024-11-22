<?php

if (!empty($_GET["id"])) {
    $id =  $_GET["id"];
    $sql = $conexion->query("delete from libro WHERE id_libro = $id");

} 

?>