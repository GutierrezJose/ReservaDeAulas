<?php
include 'conexion.php';
$codAula=$_POST['datos'];
session_start();
$consulta = "delete from ambiente  
           where cod_aula = '$codAula'";
$inserto=false;
try{
    $resultado=$conexion->query($consulta);;
    $inserto=true;
}catch (Exception $e){
}
$conexion->close();
echo $inserto;
?>