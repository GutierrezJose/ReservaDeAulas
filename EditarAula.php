<?php
include 'conexion.php';
$codAula=$_POST['usuario'];
$capacidadAula=$_POST['capacidadaula'];
$tipoAula=$_POST['ambiente'];
$codAulaN=$_POST['usuarioN'];
$capacidadAulaN=$_POST['capacidadaulaN'];
$tipoAulaN=$_POST['ambienteN'];
session_start();
$verificar ="select * 
            from ambiente
            where cod_aula = '$codAula'";
$consulta = "update from ambiente (cod_aula,capacidad,tipo_aula,disponibilidad) 
           where values ('$codAula', $capacidadAula, '$tipoAula', true)";
$resultadoVerificar=$conexion->query($verificar);
if($resultadoVerificar->num_rows == 0){
    $resultadoInsertar=$conexion->query($consulta);
    echo "<script>";
    echo "if(confirm('Se guardaron los cambios correctamente'));";  
    echo "window.location = 'ListaDeAulas.php';";
    echo "</script>";
}else{
    echo "<script>";
    echo "if(confirm('No se guardaron los cambios'));";  
    echo "window.location = 'ListaDeAulas.php';";
    echo "</script>";
}
$conexion->close();
?>