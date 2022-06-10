function selectmateria(){
    var id_materia = $("#materia").val();
    var id_docente = codigosis;
    resCal()
    $.post("./grupo.php", {id_materia : id_materia, id_docente : id_docente
    }, function(data){
        $("#grupo").html(data);
    });
}

function selectgrupo(){
    var id_materia = $("#materia").val();
    var id_docente = codigosis;
    var id_grupo = $("#grupo").val();
    resCal()
    $.post("./cantEst.php", {id_materia : id_materia, id_docente : id_docente, id_grupo : id_grupo
    }, function(data){
        document.getElementById("cantidad").value = data;
    });
    ambiente();
    selectambiente();
}

function selectambiente(){
    var id_ambiente = $("#ambiente").val();
    var id_cantidad = $("#cantidad").val();
    var hora = $("#hora").val();
    var calendario = $("#calen").val();
    var id_periodo = $("#periodo").val();
    var horas = hora;
    horas =horas.split(":");
    var hora1 = parseInt(horas[0]); 
    var sumaH, restaH, sumaM, restaM;
    if(((hora1>=6 && hora1<=18) && (hora1%3==0))){
        restaH = hora1 - 1;
        restaM = 15;
        sumaH = hora1 + 2;
        sumaM = 15;
    }
    else{
        restaH = hora1 - 2;
        restaM = 45;
        sumaH = hora1 + 1;
        sumaM = 45;
    }
    var Suma = sumaH + ':' + sumaM;
    var Resta = restaH + ':' + restaM;
   if(id_cantidad!=0){
    $.post("./ambientes.php", {id_ambiente : id_ambiente, id_cantidad : id_cantidad, hora: hora, calendario : calendario, id_periodo : id_periodo, Suma : Suma, Resta : Resta
    }, function(data){
        $("#aula").html(data);
    });
   }
}

function selectfecha(){
    document.getElementById("hora").options.item(0).selected = 'selected';
    ambiente();
    selectambiente();
    var id_fecha = $("#calen").val();
    var dia_semana = "";
    var id_materia = $("#materia").val();
    var id_docente = codigosis;
    var id_grupo = $("#grupo").val();
    var id_periodo = $("#periodo").val();
    var fecha = new Date(id_fecha);
    var semana = fecha.getDay();
    var data = "<option value='06:45:00' selected>6:45</option> <option value='08:15:00' >8:15</option> <option value='09:45:00' >9:45</option> <option value='11:15:00' >11:15</option> <option value='12:45:00' >12:45</option> <option value='14:15:00' >14:15</option> <option value='15:45:00' >15:45</option> <option value='17:15:00' >17:15</option> <option value='18:45:00' >18:45</option>";
    if(id_periodo==1)
        data = data + "<option value='20:15:00' >20:15</option>";
    switch (semana) {
        case 1:
            dia_semana = "Lunes";
            break;
        case 2:
            dia_semana = "Martes";
            break;
        case 3:
            dia_semana = "Miercoles";
            break;
        case 4:
            dia_semana = "Jueves";
            break;
        case 5:
            dia_semana = "Viernes";
            break;
        case 6:
            dia_semana = "Sabado";
            data="<option value='06:45:00' selected>6:45</option> <option value='08:15:00' >8:15</option> <option value='09:45:00' >9:45</option> <option value='11:15:00' >11:15</option> <option value='12:45:00' >12:45</option> <option value='14:15:00' >14:15</option>";
            if(id_periodo == 1)
                data = data + "<option value='15:45:00' >15:45</option>";
            break;
      }
    $("#hora").html(data);
      
    $.post("./horaReserva.php", {id_materia : id_materia, id_docente : id_docente, id_grupo : id_grupo, dia_semana : dia_semana
    }, function(data){
        document.getElementById("hora").value = data;
    });
}

function selecthora(){
    ambiente();
    selectambiente();
}

function ambiente(){
    document.getElementById("ambiente").value = "porDefecto"; 

}



function calendario(){
    resCal()
    $(".fj-date").datepicker('destroy');
    if(document.getElementById("urgencia").checked){
        $('.fj-date').datepicker({
            format: "yyyy/mm/dd",
            autoclose:true,
            pickerPosition: "bottom-left",
            daysOfWeekDisabled: [0],
            startDate: "+0d",
            endDate: diaMaximo
            });
    }else{
        $('.fj-date').datepicker({
            format: "yyyy/mm/dd",
            autoclose:true,
            pickerPosition: "bottom-left",
            daysOfWeekDisabled: [0],
            startDate: diaMinimo,
            endDate: diaMaximo
            });
    }
}

function resCal(){
    document.getElementById("calen").value = "AAAA/MM/DD";
}



