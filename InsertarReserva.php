<?php
session_start();
include 'conexion.php';
$codSis=$_SESSION['codSis'];
$codAula=$_POST['aula'];
$fecha=$_POST['calen'];
$hora=$_POST['hora'];
$reporte=$_POST['reporte'];
$cantEst=$_POST['cantidad'];
$periodo=$_POST['periodo'];
$materia=$_POST['materia'];
$ambiente=$_POST['ambiente'];
$urgencia= ( empty($_POST['urgencia']) ) ? NULL : $_POST['urgencia'];
$grupo=$_POST["grupo"];
if($urgencia)
$urgencia = 'true';
else
$urgencia = 'false';
$consulta="insert reserva (COD_AULA, CODIGO_SIS, FECHA_RESERVA, HORA_INICIO, CONFIRMACION,REPORTE, CANTIDAD_ESTUDIANTES,PERIODO, URGENCIA) 
            values('$codAula', $codSis, '$fecha', '$hora', true,'$reporte', $cantEst, $periodo, $urgencia);";
if($materia != '' && $grupo != '' && $fecha != 'AAAA/MM/DD' && $codAula != 'porDefecto' && $ambiente != 'porDefecto'){
    
try{
    $resultado=$conexion->query($consulta);
    echo "<script>";
    echo "if(confirm('Se hizo la reserva Correctamente'));";  
    echo "window.location = 'ReservaAula.php';";
    echo "</script>";
}catch (Exception $e) {
    echo "<script>";
    echo "if(confirm('Llene todos los campos del formulario'));";  
    echo "window.location = 'ReservaAula.php';";
    echo "</script>";
    }
}else{
  echo "<script>";
    echo "if(confirm('Llene todos los campos del formulario'));";  
    echo "window.location = 'ReservaAula.php';";
    echo "</script>";  
}
?>