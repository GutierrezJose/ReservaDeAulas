<?php
include 'conexion.php';
$materia = $_POST['id_materia'];
$docente = $_POST['id_docente'];
$grupo = $_POST['id_grupo'];
$fecha = $_POST['dia_semana'];
$horario = "select h.HORA_HORARIO
            from usuario u, docente_materia d, materia m,grupo g, horario h, grupo_horario p
            where u.codigo_sis=d.codigo_sis and d.cod_sis_materia = m.cod_sis_materia and m.cod_sis_materia = g.cod_sis_materia and g.codigo_sis=u.codigo_sis 
            and p.ID_GRUPO=g.COD_GRUPO and p.ID_HORARIO=h.ID_HORARIO
            and h.DIA_HORARIO = '$fecha' and u.CODIGO_SIS = $docente and m.NOMBRE_MATERIA = '$materia' and g.COD_GRUPO = '$grupo'";
$datos = "06:45:00";
try{
    $resultado = $conexion->query($horario);
    if($rowM = $resultado->fetch_assoc()){
        $datos=$rowM['HORA_HORARIO'];
    }
}catch(Exception $e){
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
echo $datos;
?>