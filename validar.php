<?php
$server = "localhost";
$user = "sergio";
$password = "";
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
if($filasAdmin){
    header("Status: 301 Moved Permanently");
    header("Location: ReservaAula.php");
    exit;
}else {if($filasDocente){
    header("Status: 301 Moved Permanently");
    header("Location: OrdenLlegada.php");
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
        header("Location: http://localhost/ReservaDeAulas/login.html");
}
}
$conexion->close();
?>