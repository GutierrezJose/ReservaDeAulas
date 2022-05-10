<?php
$server = "localhost";
    $user = "root";
    $password = "root";
    $dataBase = "tarea";
    $conexion = mysqli_connect($server, $user, $password, $dataBase);
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
    <link rel="stylesheet" href="Urgencia.css">
    <script type="text/javascript"></script>
    <title>Lista de reservas por orden de llegada</title> 
  </head>
<body>
    <div class="contenedor">
        <header id="cabecera">
          <img src="images/fcyt.png" id="logoFCYT">
          <a href="http://sagaa.fcyt.umss.edu.bo" id="nos"> Acerca de nosotros</a>
        </header>
    </div>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header"></div>
            <ul class="lisst-unstyled components">
            <li class="active">
                <li>
                    <a href="OrdenLlegada.php" class="d-block  p-3"><i class="icon ion-md-person mr-2 lead"></i> Reservas por orden de llegada</a>
                </li>
                <li>
                    <a href="FechaProxima.php" class="d-block  p-3"><i class="icon ion-md-person mr-2 lead"></i> Reservas por fecha proxima</a>
                </li>
                <li>
                    <a href="Urgencia.php" class="d-block  p-3"><i class="icon ion-md-person mr-2 lead"></i> Reservas por urgencia</a>
                </li>
            </li>
        </nav>      
        
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                
            </div>
        </nav>
        
        <div class="container">
            <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-ligth">
                <br>
                <tr>
                    <th>Codigo</th>
                    <th>Fecha</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Docente</th>
                    <th>Ambiente</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-success">
                    <?php
                        $llegada = "    select r.id_reserva, r.fecha_reserva, r.hora_inicio,r.hora_final,d.nombre_usuario,r.cod_aula,r.reporte
                                        from reserva r, docente d
                                        where r.codigo_sis=d.codigo_sis
                                        order by r.id_reserva asc;";
                        $resultado = $conexion->query($llegada);
                        if ($resultado->num_rows > 0) {
                            while ($filas = $resultado -> fetch_assoc()) {
                                ?>
                                <th><?php echo $filas["id_reserva"]?></th> 
                                <th><?php echo $filas["fecha_reserva"]?></th> 
                                <th><?php echo $filas["hora_inicio"]?></th> 
                                <th><?php echo $filas["hora_final"]?></th> 
                                <th><?php echo $filas["nombre_usuario"]?></th> 
                                <th><?php echo $filas["cod_aula"]?></th> 
                                <th><?php echo $filas["reporte"]?></th>
                </tr>
                                <?php
                            }
                        }
                            $conexion->close();
                                ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>   
    
    <script>
        $(document).ready(function(){
            $("#sidebarCollapse").on('click',function(){
                $("#sidebar").toggleClass('active');
            });
        });
    </script>
</body>
</html>
