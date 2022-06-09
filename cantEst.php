<?php
include 'conexion.php';
$materia = $_POST['id_materia'];
$docente = $_POST['id_docente'];
$grupo = $_POST['id_grupo'];
$estu = "select g.CANTIDAD_INSCRITOS
            from usuario u,materia m ,docente_materia p , grupo g
            where u.codigo_sis= $docente and u.codigo_sis=p.CODIGO_SIS 
            and p.COD_SIS_MATERIA = m.COD_SIS_MATERIA 
            and m.NOMBRE_MATERIA='$materia' 
            and m.cod_sis_materia = g.COD_SIS_MATERIA 
            and g.CODIGO_SIS = u.CODIGO_SIS and g.cod_grupo = '$grupo';";
$resultado = $conexion->query($estu);
while($cantEst = $resultado -> fetch_assoc()){
    $imprimir= $cantEst["CANTIDAD_INSCRITOS"];
    $html = "<input id='nomDoc' name='nomDoc' type='text' class='field-input' value = ".$imprimir." disabled>";
}
echo $html;
?>