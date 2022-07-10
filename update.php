<?php
include 'conexion.php';
$codAula = $_POST['ambiente'];
$tipoAula = $_POST['select'];
$capacidad = $_POST['capacidadaula'];
$disponibilidad = 1;
$sql = "UPDATE ambiente SET COD_AULA='$codAula', CAPACIDAD= '$capacidad', TIPO_AULA = '$tipoAula', DISPONIBILIDAD = '$disponibilidad' WHERE COD_AULA = '$codAula'";
$resultado= mysqli_query($conexion, $sql);
if($resultado){
    echo "<script>";
    echo "if(confirm('Se inserto correctamente'));";  
    echo "window.location = 'ListaDeAulas.php';";
    echo "</script>";
}
?>