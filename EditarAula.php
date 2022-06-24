<?php
include 'conexion.php';
$codAula = $_GET['id'];
session_start();
$verificar ="select * 
            from ambiente
            where cod_aula = '$codAula'";
$resultadoVerificar= mysqli_query($conexion, $verificar);
$fila = mysqli_fetch_array($resultadoVerificar);
$conexion->close();
?>
<!doctype html>
<html lang="en">
  <head>
    <script>
        function SoloLetras(e)
        {   
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toString();
            letras = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóú";
    
            especiales = [32, 9, 11, 13];
            tecla_especial = false;
            for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
            }
    
            if((letras.indexOf(tecla)== -1) && (!tecla_especial))
            {
                alert("solo puede ingresar letras");
                return false;
            }
            
        }
        function SoloLetrasYNumeros(ev)
        {   
            key = ev.keyCode || ev.which;
            tecla = String.fromCharCode(key).toString();
            letras = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóú";
    
            especiales = [9, 11, 13];
            tecla_especial = false;
            for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
            if((key > 47 && key < 58)){
                return true;
            }
            }
    
            if((letras.indexOf(tecla)== -1) && (!tecla_especial))
            {
                alert("solo puede ingresar letras y números sin espacios");
                return false;
            }
            
        }
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
            window.location.href = "ListaDeAulas.php"
          }
        }
      </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="AñadirAula.css">
    <script type="text/javascript"></script>
    <title>Editar Ambiente</title> 
  </head>
<body>
    <div class="contenedor">
        <header id="cabecera">
          <img src="images/fcyt.png" id="logoFCYT">
          <a href="http://sagaa.fcyt.umss.edu.bo" id="nos"> Acerca de nosotros</a>
          <a href="PaginaPrincipal.html" class="btn btn-primary" id="Inicio"> Cerrar Sesion </a>
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
        <div class="formulario">
            <h1>Editar Ambiente</h1>
            <div class="datos">
             <br>
             <form action="update.php" method="post">
               <li><label>Nombre</label><input class="campos" type="text" name="usuario" value="<?php echo $fila['COD_AULA']?>" minlength="1" id="cUsuario" size="30" required></li>
               <li>
                <div class="btn-group">
                    <div class="form-group">
                        <label for="select">Ambiente</label></br>
                       <b>El tipo de aula actual es:</b>
                       <label for="select"> <?php echo $fila['TIPO_AULA']?></label>
                        <select class="form-control" name="select" id="select">
                          <option value="Aula Comun" >Aula común</option>
                          <option value="Laboratorio">Laboratorio</option>
                          <option value="Auditorio">Auditorio</option>
                        </select>
                    </div></li>
               <li><label>Capacidad</label></li>
               <li><input class="campos "type="number" name="capacidadaula" value= "<?php echo $fila['CAPACIDAD']?>"  onkeypress=" SoloNumeros(event);" min="50" max="250" required></li>
               <li id="cancelar"><input type="reset" class="btn btn-primary cancelar" value="Cancelar" onclick=" confirmarCancelar()"></li>
               <li id="enviar"><input type="submit" class="btn btn-primary enviar"></li>
             </form>
          </div>
          </div>
    </div>   
</body>
</html>