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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src= "js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <title>Document</title>
</head>
<body>
    <form action="Post">
        <input type="text" class="form-control fj-date" placeholder = "dd/mm/aaaa" readonly>
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
    </form>
</body>
</html>