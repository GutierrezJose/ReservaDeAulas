<?php
$server = "localhost";
$user = "dani";
$password = "root";
$dataBase = "reservadeaulas";
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;
$conexion = mysqli_connect($server, $user, $password, $dataBase);
$consultaDocente="SElECT*FROM docente where codigo_sis='$usuario' and contrasena_usuario='$contraseña' and administrador = true";
$consultaAdmin="SElECT*FROM docente where codigo_sis='$usuario' and contrasena_usuario='$contraseña' and administrador = false";
$resultadoDocente=mysqli_query($conexion,$consultaDocente);
$resultadoAdmin=mysqli_query($conexion,$consultaAdmin);
$filasDocente=mysqli_num_rows($resultadoDocente);
$filasAdmin=mysqli_num_rows($resultadoAdmin);



$consulta = "SElECT*FROM docente where codigo_sis='$usuario'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_fetch_array($resultado);

if($filas){   
    if($contraseña == $filas['CONTRASENA_USUARIO']){
            
              $_SESSION['nUsuario']   = $filas['NOMBRE_USUARIO'];
              $_SESSION['codSis']   = $filas['CODIGO_SIS'];
        }
}




$consulta2 = "SElECT * FROM materia where codigo_sis='$usuario'";
$resultado2 = mysqli_query($conexion, $consulta2);
//$filas2 = mysqli_fetch_array($resultado2, MYSQLI_BOTH);
$array_data = [];
while($valores = mysqli_fetch_array($resultado2)){
array_push($array_data, $valores);
}
//if($filas2){   
    $_SESSION['nMateria']   = $array_data;

//}



$consulta3 = "SElECT*FROM grupo where codigo_sis='$usuario'";
$resultado3 = mysqli_query($conexion, $consulta3);
$filas3 = mysqli_fetch_array($resultado3);

if($filas3){   
    $_SESSION['grupo']   = $filas3['COD_GRUPO'];
    $_SESSION['cantEstudiantes']   = $filas3['CANTIDAD_INSCRITOS'];
}



if($filasAdmin){
    
    header("Status: 301 Moved Permanently");
    header("Location: http://localhost:88/ReservaDeAulas/ReservaDeAulas/ReservaAula.php");
    exit;
}else {if($filasDocente){
    
    header("Status: 301 Moved Permanently");
    header("Location: http://localhost:88/ReservaDeAulas/ReservaDeAulas/OrdenLlegada.php");
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
        header("Location: http://localhost:88/ReservaDeAulas/ReservaDeAulas/login.html");
}
}
$conexion->close();
?>