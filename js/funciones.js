function selectmateria(){
    var id_materia = $("#materia").val();
    var id_docente = codigosis;
    $.post("./grupo.php", {id_materia : id_materia, id_docente : id_docente
    }, function(data){
        $("#grupo").html(data);
    });
}

function selectgrupo(){
    var id_materia = $("#materia").val();
    var id_docente = codigosis;
    var id_grupo = $("#grupo").val();
    $.post("./cantEst.php", {id_materia : id_materia, id_docente : id_docente, id_grupo : id_grupo
    }, function(data){
        $("#estudiantes").html(data);
    });
}

function selectambiente(){
    var id_ambiente = $("#ambiente").val();
    $.post("./ambientes.php", {id_ambiente : id_ambiente
    }, function(data){
        $("#aula").html(data);
    });
}