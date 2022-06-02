<?php
$server = "localhost";
    $user = "root";
    $password = "";
    $dataBase = "reservadeaula";
    $conexion = mysqli_connect($server, $user, $password, $dataBase);
    $query1 = "SELECT diaMinimo FROM configuracion";
    $query2 = "SELECT diaMaximo FROM configuracion";
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
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Reserva aula</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            <a href="PaginaPrincipal.html" class="btn btn-primary" id="Cerrar"> Cerrar Sesión </a>
        </header>
    <!-- MENU LATERAL-->
    <div class="d-flex">
        <div id="sidebar-container">
          <div class="menu">
            <i class="bi bi-person-fill" id="User"></i>
            <h6>NOMBRE DOCENTE</h6>
          </div> 
        </div>
        <div class="formulario">
            <h3>Reserva de Aula</h3><br>
            <form class="datos" action="Post">
                <div class="form-field">
                    <div class="form-column">
                        <div class="container-field">
                            <label for="html">Nombre docente:</label><br>
                                <input type="text" class="field-input" disabled>
                        </div>
                        <div class="container-field">
                            <label for="html">Numero estudiantes:</label><br>
                                <input type="text" class="field-input" disabled>
                        </div>
                        <div class="container-field">
                            <label for="html">Hora inicio:</label><br>
                            <select class="field-input" name="select">
                                <option value="" selected>6:45</option>
                                <option value="value1" >8:15</option>
                                <option value="value1" >9:45</option>
                                <option value="value1" >11:15</option>
                                <option value="value1" >12:45</option>
                                <option value="value1" >14:15</option>
                                <option value="value1" >15:45</option>
                                <option value="value1" >17:15</option>
                                <option value="value1" >18:45</option>
                                <option value="value1" >20:15</option>
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
                            <select class="field-input" name="select">
                                <option value="value2" selected>Calculo I</option>
                            </select>
                        </div>
                        <div class="container-field">
                            <input type="checkbox" name="" id="" class="checkbox">
                            <label for="html">Reserva por urgencia</label><br>
                        </div>
                        <div class="container-field">
                            <label for="html">Periodo(s):</label><br>
                            <select class="field-input" name="select">
                                <option value="value3" >1</option>
                                <option value="value3" >2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="container-field">
                            <label for="html">Grupo:</label><br>
                            <select class="field-input" name="select">
                                <option value="value3" selected>G3</option>
                            </select>
                        </div>
                        <div class="container-field">
                            <label for="html">Fecha de reserva:</label><br>
                            <input class="field-input" type="date" id="birthday" name="birthday">
                            <Script>
                                var sumaDiaMinimo = 1+<?php echo $diaMinino?>;
                                var diaMinimo = '+'+sumaDiaMinimo+'d';
                                var diaMaximo = '+'+<?php echo $diaMaximo?>+'d';
                                alert(diaMaximo);
                                $.fn.datepicker.dates['en'] = {
                                days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
                                daysShort: ["Dom", "Lun", "Mar", "Mie", "Juev", "Vie", "Sab"],
                                daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                                today: "Hoy",
                                clear: "Borrar",
                                format: "dd/mm/yyyy",
                                titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
                                weekStart: 1
                                };
                                $('.fj-date').datepicker({
                                format: "dd/mm/yyyy",
                                autoclose:true,
                                pickerPosition: "bottom-left",
                                daysOfWeekDisabled: [0],
                                startDate: diaMinimo,
                                endDate: diaMaximo
                                });
                            </Script>
                        </div>
                        <div class="container-field">
                            <label for="html">Ambiente:</label><br>
                            <select class="field-input" name="select">
                                <option value="value3" >Aula común</option>
                                <option value="value3" >Laboratorio</option>
                                <option value="value3" >Auditorio</option>
                            </select>
                        </div>
                        <div class="container-field">
                            <label for="html">Ambientes disponibles:</label><br>
                            <select class="field-input" name="select">
                                <option value="value3" >691A</option>
                            </select>
                        </div>
                    </div>                    
                </div>
                
                <div class="form-field">
                    <br>
                    <label for="html" id="motivo">Motivo de la reserva : </label><br>
                    <textarea class="text-area" name="" id="" cols="65" rows="2" ></textarea>
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