<?php

if (!empty($_GET["id"])) {
    $id =  $_GET["id"];
    $sql = $conexion->query("delete from existencias WHERE id_existencias = $id");

} 

?>