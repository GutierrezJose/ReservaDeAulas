<?php
include 'conexion.php';
$materia = $_POST['id_materia'];
$docente = $_POST['id_docente'];
$grupo = "select g.cod_grupo
        from usuario u,materia m ,docente_materia p , grupo g
        where u.codigo_sis= $docente and u.codigo_sis=p.CODIGO_SIS and 
        p.COD_SIS_MATERIA = m.COD_SIS_MATERIA and m.NOMBRE_MATERIA='$materia' 
        and m.cod_sis_materia = g.COD_SIS_MATERIA and g.CODIGO_SIS = u.CODIGO_SIS
        order by g.cod_grupo asc;";
$resultado = $conexion->query($grupo);

$html = "<option value='0'>Seleccionar Grupo</option>";

while($rowM = $resultado->fetch_assoc()){
    $html.= "<option value='".$rowM['cod_grupo']."'>".$rowM['cod_grupo']."</option>";
}
echo $html;
?>