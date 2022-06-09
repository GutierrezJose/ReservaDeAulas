<?php
include 'conexion.php';
$ambiente = $_POST['id_ambiente'];
$aula = "select cod_aula
        from ambiente
        where tipo_aula = '$ambiente';";
$resultado = $conexion->query($aula);

$html = "<option value=''>Seleccionar Ambiente</option>";

while($rowM = $resultado->fetch_assoc()){
    $temporal=$rowM["cod_aula"];
    $html.= "<option value='".$temporal."'>".$temporal."</option>";
}
echo $html;
?>