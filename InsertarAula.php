
<?php
include 'conexion.php';
$codAula=$_POST['usuario'];
$capacidadAula=$_POST['capacidadaula'];
$tipoAula=$_POST['select'];
session_start();
$verificar ="select * 
            from ambiente
            where cod_aula = '$codAula'";
$consulta = "insert into ambiente (cod_aula,capacidad,tipo_aula,disponibilidad) 
           values ('$codAula', $capacidadAula, '$tipoAula', true)";
$resultadoVerificar=$conexion->query($verificar);
if($resultadoVerificar->num_rows == 0){
    $resultadoInsertar=$conexion->query($consulta);
    echo "<script>";
    echo "if(confirm('Se inserto correctamente'));";  
    echo "window.location = 'ListaDeAulas.php';";
    echo "</script>";
}else{
    echo "<script>";
    echo "if(confirm('No se inserto correctamente, por favor verifique sus parametros'));";  
    echo "window.location = 'AñadirAula.html';";
    echo "</script>";
}
$conexion->close();
?>

