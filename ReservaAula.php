
<?php

session_start();
include 'conexion.php';
     $query1 = "SELECT diaMinimo FROM configuracion where id_configuracion=1;";
     $query2 = "SELECT diaMaximo FROM configuracion where id_configuracion=1;";
    $resultado = $conexion -> query($query1);
        $filas = $resultado -> fetch_assoc();
        $diaMinino =  $filas["diaMinimo"];
        date_default_timezone_set("America/La_Paz");
        $fecha = date("d");
        $sumaDia = $fecha + $diaMinino;
        //agregado
    $resultado2 = $conexion -> query($query2);
        $filas2 = $resultado2 -> fetch_assoc(); 
       $diaMaximo = $filas2["diaMaximo"];
    //agregado

    $sumaDiaMaximo = $fecha + $diaMaximo;
    $CD=$_SESSION['codSis'];

    $materia= mysqli_query($conexion,"SElECT m.NOMBRE_MATERIA 
                                    FROM usuario d,materia m ,docente_materia p 
                                    where d.codigo_sis= $CD and d.codigo_sis=p.CODIGO_SIS and p.COD_SIS_MATERIA = m.COD_SIS_MATERIA;" );

    
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
     <!--  <script>
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
       /*   onkeypress="SoloLetras(event);"*/
      </script> -->

        <title>Reserva aula</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script> var codigosis = <?php echo $CD ?>; </script>
        <script language="javascript" src="js/jquery-3.6.0.min.js"></script>
        <script language="javascript" src="js/funciones.js"></script>    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
        <script src= "js/bootstrap-datepicker.js"></script>
        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="ReservaAula.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    </head>
    <body>
    <div class="contenedor">
        <header id="cabecera">
            <img src="images/fcyt.png" id="logoFCYT">
            <a href="http://sagaa.fcyt.umss.edu.bo" id="nos"> Acerca de nosotros</a>
            <a href="PaginaPrincipal.html" class="btn btn-primary" id="Cerrar"> Cerrar Sesión </a>
        </header>
    <!-- MENU LATERAL-->
    <div class="d-flex">
        <div id="sidebar-container">
          <div class="menu">
            <i class="bi bi-person-fill" id="User"></i>

             <!--  <h6>NOMBRE DOCENTE</h6>-->

            <h6><?php echo $_SESSION['nUsuario'] ?></h6>
          </div> 
        </div>
        <div class="formulario">
            <h3>Reserva de Aula</h3><br>
            <form class="datos" action="InsertarReserva.php" method="post">
                <div class="form-field">
                    <div class="form-column">
                        <div class="container-field">
                            <label for="html">Nombre docente:</label><br>
                                  <!--  DANI-->

                                <input id="nomDoc" name="nomDoc" type="text" class="field-input" value = "<?php echo  $_SESSION['nUsuario'] ?>" readonly>
                        </div>
                        <div class="container-field">
                            <label for="html">Numero estudiantes:</label><br>
                            <input id="cantidad" name="cantidad" type="text" class="field-input" value = "0" readonly>

                        </div>
                        <div class="container-field">
                            <label for="html">Hora inicio:</label><br>
                            <select class="field-input" name="hora" id="hora" onchange="selecthora()">
                                <option  selected> Seleccionar Hora</option>
                                <option value="06:45:00" >6:45</option>
                                <option value="08:15:00" >8:15</option>
                                <option value="09:45:00" >9:45</option>
                                <option value="11:15:00" >11:15</option>
                                <option value="12:45:00" >12:45</option>
                                <option value="14:15:00" >14:15</option>
                                <option value="15:45:00" >15:45</option>
                                <option value="17:15:00" >17:15</option>
                                <option value="18:45:00" >18:45</option>
                                <option value="20:15:00" >20:15</option>
                            </select>
                        </div>
                        

                        <!-- <div class="container-field">
                            <label for="html">Motivo de la reserva:</label><br>
                            <select name="select">
                                <option value="value2" selected>Calculo I</option>
                            </select>
                        </div> -->
                   
                   
                   
                    </div>
                    
                     
                    <div class="form-column">
                        <div class="container-field">
                            <label for="html">Materia:</label><br>
                            <select id="materia" name="materia" class="field-input" onchange="selectmateria()" >
                                <option value="">Seleccionar Materia </option>
                                <?php 
                                while($datosMateria = mysqli_fetch_array($materia)) {
                                    ?>
                                    <option value="<?php echo $datosMateria['NOMBRE_MATERIA'] ?>"> <?php echo $datosMateria['NOMBRE_MATERIA'] ?></option>
                                <?php 
                                } 
                                ?>   
                            </select>
                        </div>



                        <div class="container-field">
                        <input id="urgencia" name="urgencia" type="checkbox" class="checkbox" onclick="calendario()">
                            <label for="html">Reserva por urgencia</label><br>
                        </div>
                        <div class="container-field">
                            <label for="html">Periodo(s):</label><br>
                            <select class="field-input" name="periodo" id="periodo" onchange="selectfecha()">
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="container-field">
                            <label for="html">Grupo:</label><br>
                            <select id="grupo" name="grupo" class="field-input" onchange="selectgrupo()" >
                            <option value=''>Seleccionar Grupo</option>
                            </select>
                                
                              
                            
                        </div>
                        <div class="container-field">
                            <label for="html">Fecha de reserva:</label><br>
                            <input id="calen" name="calen" type="text" class="form-control fj-date" placeholder = "AAAA/MM/DD" readonly onchange="selectfecha()">
                            <Script>
                                var sumaDiaMinimo = <?php echo $diaMinino?>;
                                var diaMinimo = '+'+sumaDiaMinimo+'d';
                                var diaMaximo = '+'+<?php echo $diaMaximo?>+'d';
                                $.fn.datepicker.dates['en'] = {
                                days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
                                daysShort: ["Dom", "Lun", "Mar", "Mie", "Juev", "Vie", "Sab"],
                                daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                                today: "Hoy",
                                clear: "Borrar",
                                format: "yyyy/mm/dd",
                                titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
                                weekStart: 1
                                };
                                calendario();
                            </Script>
                        </div>
                        <div class="container-field">
                            <label for="html">Ambiente:</label><br>
                            <select id = "ambiente" name="ambiente" class="field-input" onchange="selectambiente();" )>
                                <option value="porDefecto" >Seleccionar Tipo De Ambiente</option>
                                <option value="Aula común" >Aula común</option>
                                <option value="Laboratorio" >Laboratorio</option>
                                <option value="Auditorio" >Auditorio</option>
                            </select>
                        </div>
                        <div class="container-field">
                            <label for="html">Ambientes disponibles:</label><br>
                            <select id="aula" name="aula" class="field-input">
                                <option value="" >Seleccionar Ambiente</option>
                            </select>
                        </div>
                    </div>                    
                </div>
                
                <div class="form-field">
                    <br>
                    <label for="html" id="motivo">Motivo de la reserva : </label><br>
                    <textarea name="reporte" class="text-area" name="" id="" cols="65" rows="2"  required ></textarea>                   
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" id="Enviar" name=""  value="Enviar">
                </div>
                
                
            </form>
        </div>
    </div>

        <footer>
        </footer>
    </div>
    </body>
</html>
