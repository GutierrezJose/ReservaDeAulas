function selectgrupo(){
    var id_materia = $("#materia").val();
    var id_docente = codigosis;
    var id_grupo = $("#grupo").val();
    $.post("./cantEst.php", {id_materia : id_materia, id_docente : id_docente, id_grupo : id_grupo
    }, function(data){
        $("#estudiantes").html(data);
    });
}