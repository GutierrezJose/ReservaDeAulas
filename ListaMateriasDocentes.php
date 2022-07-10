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
    <title>Lista de Materia-Docentes</title> 
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
        <h1>Lista de Materia-Docentes</h1>
        <form>
            <br>
            <i class="icon ion-md-search mr-2 lead"><text> </text></i><input id="searchTerm" type="text" placeholder="Buscar" onkeyup="doSearch()" />
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="datos">
                <thead class="thead-ligth">
                <br>
                <tr>
                    <th>Docente</th>
                    <th>Materia</th>
                    <th>Cod SIS Materia</th>
                    <th>Grupo</th>
                    <th>Cantidad inscritos</th>
                    <th>Dia Horario</th>
                    <th>Hora horario</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-success">
                    <?php
                        $llegada = "    select u.nombre_usuario,m.nombre_materia, m.cod_sis_materia,g.cod_grupo,g.cantidad_inscritos,h.DIA_HORARIO,h.HORA_HORARIO
                                        from usuario u, docente_materia d, materia m,grupo g, horario h, grupo_horario p
                                        where u.codigo_sis=d.codigo_sis and d.cod_sis_materia = m.cod_sis_materia and m.cod_sis_materia = g.cod_sis_materia and g.codigo_sis=u.codigo_sis and p.ID_GRUPO=g.COD_GRUPO and p.ID_HORARIO=h.ID_HORARIO
                                        order by u.nombre_usuario;";
                        $resultado = $conexion->query($llegada);
                        if ($resultado->num_rows > 0) {
                            while ($filas = $resultado -> fetch_assoc()) {
                                ?>
                                <td><?php echo $filas["nombre_usuario"]?></td> 
                                <td><?php echo $filas["nombre_materia"]?></td> 
                                <td><?php echo $filas["cod_sis_materia"]?></td> 
                                <td><?php echo $filas["cod_grupo"]?></td> 
                                <td><?php echo $filas["cantidad_inscritos"]?></td>
                                <td><?php echo $filas["DIA_HORARIO"]?></td>
                                <td><?php echo $filas["HORA_HORARIO"]?></td>
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
    <script>
        function doSearch()
        {
            const tableReg = document.getElementById('datos');
            const searchText = document.getElementById('searchTerm').value.toLowerCase();
            let total = 0;

            // Recorremos todas las filas con contenido de la tabla
            for (let i = 1; i < tableReg.rows.length; i++) {
                // Si el td tiene la clase "noSearch" no se busca en su cntenido
                if (tableReg.rows[i].classList.contains("noSearch")) {
                    continue;
                }

                let found = false;
                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                // Recorremos todas las celdas
                for (let j = 0; j < cellsOfRow.length && !found; j++) {
                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                        found = true;
                        total++;
                    }
                }
                if (found) {
                    tableReg.rows[i].style.display = '';
                } else {
                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    tableReg.rows[i].style.display = 'none';
                }
            }

            // mostramos las coincidencias
            const lastTR=tableReg.rows[tableReg.rows.length-1];
            const td=lastTR.querySelector("td");
            lastTR.classList.remove("hide", "red");
            
        }
    </script>
</body>
</html>