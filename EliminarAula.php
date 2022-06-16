<?php
    include 'conexion.php';

    $sql = "DELETE FROM ambiente WHERE cod_aula=$codAula"
    $conexion->query($sql);
?>