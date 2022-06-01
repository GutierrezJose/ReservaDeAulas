<?php
$server = "localhost";
$user = "root";
$password = "";
$dataBase = "reservadeaula";
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;
$conexion = mysqli_connect($server, $user, $password, $dataBase);
$consulta="SElECT*FROM docente where codigo_sis='$usuario' and contrasena_usuario='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
if($filas){
    header("Status: 301 Moved Permanently");
    header("Location: http://localhost:8080/ReservasDeAulasGrupo/ReservaDeAulas/OrdenLlegada.php");
exit;
}else{
    ?>
    <?php
        include("Login.html");
    ?>
    <h1> 
        <script>
            alert("Error al iniciar sesion"); 
        </script>
    </h1>
    <?php
}
$conexion->close();
?>