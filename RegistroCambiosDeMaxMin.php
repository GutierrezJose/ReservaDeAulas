<?php
include 'conexion.php';
?>

<!doctype html>
<html lang="en">
  <head>  
    <script>
        
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="Urgencia.css">
    <script type="text/javascript"></script>
    <title>Lista de aulas</title> 
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
                    <a href="OrdenLlegada.php" class="d-block  p-3"><i class="icon ion-md-document mr-2 lead"></i> Reservas por orden de llegada</a>
                </li>
                <li>
                    <a href="FechaProxima.php" class="d-block  p-3"><i class="icon ion-md-calendar mr-2 lead"></i> Reservas por fecha proxima</a>
                </li>
                <li>
                    <a href="Urgencia.php" class="d-block  p-3"><i class="icon ion-md-alert mr-2 lead"></i> Reservas por urgencia</a>
                </li>
                <li>
                    <a href="MAXmin.php" class="d-block  p-3"><i class="icon ion-md-create mr-2 lead"></i> Cambiar limite de reservas</a>
                </li>
                <li>
                    <a href="RegistroCambiosDeMaxMin.php" class="d-block  p-3"><i class="icon ion-md-document mr-2 lead"></i> Registro de cambios de limite</a>
                </li>
                <li>
                    <a href="AñadirAula.html" class="d-block  p-3"><i class="icon ion-md-add mr-2 lead"></i> Añadir Aulas</a>
                </li>
                <li>
                    <a href="ListaDeAulas.html" class="d-block  p-3"><i class="icon ion-md-document mr-2 lead"></i> Lista de aulas</a>
                </li>
                
            </li>
        </nav>      
        
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                
            </div>
        </nav>
        <div class="container">
            <h1>Registro de cambios de dias maximo y minimo para reserva de aulas</h1>
            <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-ligth">
                <br>
                <tr>
                    <th>Maximo</th>
                    <th>Minimo</th>
                    <th>Motivo</th>
                    <th>Fecha de cambio</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-success">
                    <?php
                        $llegada = "    select cant_maximo, cant_minimo, motivo, fecha_de_cambio
                                        from historial_cambios;";
                        $resultado = $conexion->query($llegada);
                        if ($resultado->num_rows > 0) {
                            while ($filas = $resultado -> fetch_assoc()) {
                                ?>
                                <th><?php echo $filas["cant_maximo"]?></th> 
                                <th><?php echo $filas["cant_minimo"]?></th> 
                                <th><?php echo $filas["motivo"]?></th> 
                                <th><?php echo $filas["fecha_de_cambio"]?></th> 
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
</body>
</html>