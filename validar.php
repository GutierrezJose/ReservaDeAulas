<?php
include 'conexion.php';
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;
$consultaDocente="SElECT*FROM usuario where codigo_sis='$usuario' and contrasena_usuario='$contraseña' and administrador = true";
$consultaAdmin="SElECT*FROM usuario where codigo_sis='$usuario' and contrasena_usuario='$contraseña' and administrador = false";
$resultadoDocente=mysqli_query($conexion,$consultaDocente);
$resultadoAdmin=mysqli_query($conexion,$consultaAdmin);
$filasDocente=mysqli_num_rows($resultadoDocente);
$filasAdmin=mysqli_num_rows($resultadoAdmin);



$consulta = "SElECT*FROM usuario d where d.codigo_sis='$usuario';";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_fetch_array($resultado);

if($filas){   
    if($contraseña == $filas['CONTRASENA_USUARIO']){
            
              $_SESSION['nUsuario']   = $filas['NOMBRE_USUARIO'];
              $_SESSION['codSis']   = $filas['CODIGO_SIS'];
        }
}




$consulta2 = "SElECT m.COD_SIS_MATERIA, m.NOMBRE_MATERIA 
                FROM usuario d,materia m ,docente_materia p 
                where d.codigo_sis= $usuario and d.codigo_sis=p.CODIGO_SIS and p.COD_SIS_MATERIA = m.COD_SIS_MATERIA;";
$resultado2 = mysqli_query($conexion, $consulta2);
//$filas2 = mysqli_fetch_array($resultado2, MYSQLI_BOTH);
$array_data = [];
while($valores = mysqli_fetch_array($resultado2)){
array_push($array_data, $valores);
}
//if($filas2){   
    $_SESSION['nMateria']   = $array_data;

//}



//$consulta3 = "SElECT*FROM grupo where codigo_sis='$usuario'";
//$resultado3 = mysqli_query($conexion, $consulta3);
//$filas3 = mysqli_fetch_array($resultado3);

//if($filas3){   
///    $_SESSION['grupo']   = $filas3['COD_GRUPO'];
//    $_SESSION['cantEstudiantes']   = $filas3['CANTIDAD_INSCRITOS'];
//}



if($filasAdmin){
    
    header("Status: 301 Moved Permanently");
    header("Location: ReservaAula.php");
    exit;
}else {if($filasDocente){
    
    header("Status: 301 Moved Permanently");
    header("Location: Reservas.php");
    exit;
}else {
    ?>
    <h1> 
        <script>
            alert("Error al iniciar sesion"); 
        </script>
    </h1>
    <?php
        header("Status: 301 Moved Permanently");
        header("Location: login.html");
}
}
$conexion->close();
?>