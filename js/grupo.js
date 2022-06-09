function selectmateria(){
    var id_materia = $("#materia").val();
    var id_docente = codigosis;
    $.post("./grupo.php", {id_materia : id_materia, id_docente : id_docente
    }, function(data){
        $("#grupo").html(data);
    });
}