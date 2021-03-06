<?php
include 'conexion.php';

$diaMinimo = "select diaMinimo
                from configuracion
                where id_configuracion=1;";
$diaMaximo = "select diaMaximo
                from configuracion
                where id_configuracion=1;";
$consultaMin = $conexion->query($diaMinimo);
$consultaMax = $conexion->query($diaMaximo);
$Min = $consultaMin -> fetch_assoc();
$Max = $consultaMax -> fetch_assoc();
$conexion->close();
?>

<!doctype html>
<html lang="en">
  <head>  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="MAXmin.css">
    <script type="text/javascript"></script>
    <title>Cambio</title> 
  </head>
<body>
    <div class="contenedor">
        <header id="cabecera">
          <img src="images/fcyt.png" id="logoFCYT">
          <a href="http://sagaa.fcyt.umss.edu.bo" id="nos"> Acerca de nosotros</a>
          <a href="index.html" class="btn btn-primary" id="Inicio"> Cerrar Sesion </a>
        </header>
    </div>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header"></div>
            <ul class="lisst-unstyled components">
            <li class="active">
                <li>
                    <h1><i class="icon ion-md-person mr-2 lead"> Administrador</i></h1>
                </li>
                <li>
                    <a href="Reservas.php" class="d-block  p-3"><i class="icon ion-md-document mr-2 lead"></i> Reservas</a>
                </li>
                <li>
                    <a href="Urgencia.php" class="d-block  p-3"><i class="icon ion-md-alert mr-2 lead"></i> Reservas por urgencia</a>
                </li>
                <li>
                    <a href="RegistroCambiosDeMaxMin.php" class="d-block  p-3"><i class="icon ion-md-document mr-2 lead"></i> Registro de cambios de limite</a>
                </li>
                <li>
                    <a href="ListaDeAulas.php" class="d-block  p-3"><i class="icon ion-md-document mr-2 lead"></i> Lista de ambientes</a>
                </li>
                <li>
                    <a href="ListaDocentes.php" class="d-block  p-3"><i class="icon ion-md-person mr-2 lead"></i> Lista de usuarios</a>
                </li>
                <li>
                    <a href="ListaMateriasDocentes.php" class="d-block  p-3"><i class="icon ion-md-document mr-2 lead"></i> Lista de Materias-Docentes</a>
                </li>
            </li>
        </nav>          
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                
            </div>
        </nav>
        
        <div class="container">
            <h1>Cambiar los dias limite para reservar</h1>
            <div class="datos">
             <br>
             <form action="InsertarDias.php" method="post">
               <li><label>Minimo de dias</label><input class="campos" name="minimo" value="" type="number" placeholder="Minimo de dias" min="1" class="inputs" onkeypress=" SoloNumeros(event);" required></li>
               <li><label>Maximo de dias</label><input class="campos" name="maximo" value="" type="number" placeholder="Maximo de dias" min="1"  class="inputs" onkeypress=" SoloNumeros(event);" required></li>
               <li><label>Motivo del cambio</label><input class="campos" name="motivo" value="" type="text" placeholder="Motivo por el que hace el cambio" size="30" class="inputs" required></li>
               <li id="cancelar"><input type="reset" class="btn btn-primary cancelar" onclick=" confirmarCancelar()" value="Cancelar" ></li>
               <li id="enviar"><input type="submit" class="btn btn-primary enviar" value="Guardar"></li>
               <li><label><strong>Numero de dias minimo actual: <?php echo $Min["diaMinimo"]?> </strong></label></li>
               <li><label><strong>Numero de dias maximo actual: <?php echo $Max["diaMaximo"]?> </strong></label></li>
             </form>
          </div>
        </div>
        <script>
        function SoloNumeros(evt)
        {
            if(window.event){
                keynum = evt.keyCode;
            }
            else{
                keynum = evt.which;
            }
            if((keynum > 47 && keynum < 58)||keynum == 32){
                return true;
            }
            else
            {
                alert("Solo puede ingresar numeros");
                return false;
            }
        }
    </script> 
    <script type="text/javascript">
        function confirmarCancelar()
        {
          var respuesta = confirm("Estas seguro de cancelar");
          if(respuesta == true){
            window.location.href = "RegistroCambiosDeMaxMin.php"
          }
        }
        </script>
    </div>   
</body>
</html>