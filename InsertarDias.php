<?php
include 'conexion.php';

$maximo=$_POST['maximo'];
$minimo=$_POST['minimo'];
$motivo=$_POST['motivo'];
session_start();


$updateConf = "update configuracion
                set diaMinimo = $minimo, diaMaximo = $maximo
                where id_configuracion = 1;";
$InsDias = "insert historial_cambios (id_configuracion,fecha_de_cambio,cant_minimo,cant_maximo,motivo)
                values (1,CURDATE(), $minimo,$maximo,'$motivo');";
if($minimo > $maximo){
    echo "<script>";
    echo "if(confirm('Dia Minimo no puede ser mayor a dia maximo'));";  
    echo "window.location = 'MAXmin.php';";
    echo "</script>";
}else{
    $actualizar = $conexion->query($updateConf);
    $insertar = $conexion->query($InsDias);
    echo "<script>";
    echo "if(confirm('Se Actualizo los dias minimos y maximos'));";  
    echo "window.location = 'RegistroCambiosDeMaxMin.php';";
    echo "</script>";

}

$conexion->close();
?>