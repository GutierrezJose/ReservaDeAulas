<?php
include 'conexion.php';
$codAula=$_POST['usuario'];
$capacidadAula=$_POST['capacidadaula'];
$tipoAula=$_POST['ambiente'];
session_start();
$verificar ="select * 
            from ambiente
            where cod_aula = '$codAula'";
$consulta = "delete from ambiente (cod_aula,capacidad,tipo_aula,disponibilidad) 
           where values ('$codAula', $capacidadAula, '$tipoAula', true)";
$resultadoVerificar=$conexion->query($verificar);
if($resultadoVerificar->num_rows == 0){
    $resultadoInsertar=$conexion->query($consulta);
    echo "<script>";
    echo "if(confirm('Se elimino correctamente'));";  
    echo "window.location = 'ListaDeAulas.php';";
    echo "</script>";
}else{
    echo "<script>";
    echo "if(confirm('No se pudo eliminar'));";  
    echo "window.location = 'ListaDeAulas.php';";
    echo "</script>";
}
$conexion->close();
?>