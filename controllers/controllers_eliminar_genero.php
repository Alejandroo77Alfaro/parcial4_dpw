<?php

if (!empty($_GET["id"])) {
    $id =  $_GET["id"];
    $sql = $conexion->query("delete from genero WHERE id_genero = $id");

} 

?>
