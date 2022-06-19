<?php
include 'conexion.php';
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
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
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
                    <a href="RegistroCambiosDeMaxMin.php" class="d-block  p-3"><i class="icon ion-md-document mr-2 lead"></i> Registro de cambios de limite</a>
                </li>
                <li>
                    <a href="ListaDeAulas.php" class="d-block  p-3"><i class="icon ion-md-document mr-2 lead"></i> Lista de aulas</a>
                </li>
                <li>
                    <a href="ListaDocentes.php" class="d-block  p-3"><i class="icon ion-md-person mr-2 lead"></i> Lista de docentes</a>
                </li>
            </li>
        </nav>      
        
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                
            </div>
        </nav>
        
        <div class="container">
        <h1>Lista de docentes</h1>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table">
                <thead class="thead-ligth">
                <br>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Codigo SIS</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-success">
                    <?php
                        $llegada = "    select r.nombre_usuario, r.correo_usuario, r.codigo_sis,r.contrasena_usuario
                                        from usuario r, usuario d
                                        where r.codigo_sis=d.codigo_sis
                                        order by r.codigo_sis asc;";
                        $resultado = $conexion->query($llegada);
                        if ($resultado->num_rows > 0) {
                            while ($filas = $resultado -> fetch_assoc()) {
                                ?>
                                <td><?php echo $filas["nombre_usuario"]?></td> 
                                <td><?php echo $filas["correo_usuario"]?></td> 
                                <td><?php echo $filas["codigo_sis"]?></td> 
                                <td><?php echo $filas["contrasena_usuario"]?></td> 
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
    $('th').click(function() {
    var table = $(this).parents('table').eq(0)
    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
    this.asc = !this.asc
    if (!this.asc) {
      rows = rows.reverse()
    }
    for (var i = 0; i < rows.length; i++) {
      table.append(rows[i])
    }
    setIcon($(this), this.asc);
  })

  function comparer(index) {
    return function(a, b) {
      var valA = getCellValue(a, index),
        valB = getCellValue(b, index)
      return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
    }
  }

  function getCellValue(row, index) {
    return $(row).children('td').eq(index).html()
  }

  function setIcon(element, asc) {
    $("th").each(function(index) {
      $(this).removeClass("sorting");
      $(this).removeClass("asc");
      $(this).removeClass("desc");
    });
    element.addClass("sorting");
    if (asc) element.addClass("asc");
    else element.addClass("desc");
  }
    </script>
</body>
</html>