<?php
include 'conexion.php';
$ambiente = $_POST['id_ambiente'];
$cantidad = $_POST['id_cantidad'];
$hora=$_POST['hora'];
$fecha=$_POST['calendario'];
$periodo=$_POST['id_periodo'];
$suma = $_POST['Suma'];
$resta= $_POST['Resta'];
$aula = "select a.cod_aula
        from ambiente a
        where a.TIPO_AULA= '$ambiente'
        and a.CAPACIDAD  >= $cantidad
        and a.COD_AULA not in (select r.cod_aula 
                                from reserva r, ambiente m
                                where r.COD_AULA = m.COD_AULA and
                                r.FECHA_RESERVA = '$fecha' and
                                r.HORA_INICIO = '$hora') $verificar1";
                            
$verificar1="and a.cod_aula not in (select *
            from reserva r, ambiente m
            where r.COD_AULA = m.COD_AULA and
            r.FECHA_RESERVA = '$fecha' and 
            r.PERIODO = 2 and r.HORA_INICIO = '$resta')";
$verificar2="and a.cod_aula not in (select r.cod_aula 
            from reserva r, ambiente m
            where r.COD_AULA = m.COD_AULA and
            r.FECHA_RESERVA = '$fecha' and
            r.HORA_INICIO = '$suma')";
$html = "<option value='porDefecto'>Seleccionar Ambiente</option>";
try {
    
    if($periodo==2)
        $aula .= $verificar2;
    $resultado = $conexion->query($aula);
    while($rowM = $resultado->fetch_assoc()){
        $temporal=$rowM["cod_aula"];
        $html.= "<option value='".$temporal."'>".$temporal."</option>";
    }
    
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
echo $html;

?>