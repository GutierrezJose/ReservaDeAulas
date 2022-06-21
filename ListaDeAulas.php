<?php
include 'conexion.php';
$ambiente = "select cod_aula,tipo_aula,capacidad
            from ambiente";
$resultado = $conexion->query($ambiente);
?>
<!doctype html>
<html lang="en">
  <head>
    <script language="javascript" src="js/jquery-3.6.0.min.js"></script>
    <script language="javascript" src="js/funciones.js"></script>
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
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
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
            <h1>Lista de ambientes registrados</h1>
            <button class="btn btn-primary" onclick="location.href='AñadirAula.html'"><i class="icon ion-md-add mr-2 lead"></i> Añadir Aula</button>
            <div class="panel panel-default">
            <div class="panel-body">
            <table class="table table-striped table-bordered" id="ambientes">
                <thead class="thead-ligth">
                <br>
                <tr>
                    <th>Numero</th>
                    <th>Ambiente</th>
                    <th>Capacidad</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>  
                </thead>
            <tbody>
                    <?php
                        
                        if ($resultado->num_rows > 0) {
                            while ($filas = $resultado -> fetch_assoc()) {
                                ?>
                                <tr class="registro-<?php echo $filas["cod_aula"]?>">
                                <td><?php echo $filas["cod_aula"]?></td> 
                                <td><?php echo $filas["tipo_aula"]?></td> 
                                <td><?php echo $filas["capacidad"]?></td> 
                                <td><button class="btn btn-warning"><i class="icon ion-md-create mr-2 lead"></i> Editar</button></td>
                                <td><button class="btn btn-danger" onclick="deleteAula('<?php echo $filas['cod_aula'] ?>')" ><i class="icon ion-md-trash mr-2 lead" ></i> Eliminar</button></td>
                                </tr>
                                <?php
                            }
                        }
                        $conexion->close();
                    ?>
            </tbody>
    </table>
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
</div>
</div>
</div>
</div>   
</body>
</html>