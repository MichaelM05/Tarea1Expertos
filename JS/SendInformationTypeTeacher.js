
function sendInformationTeacher(x1, x2, y1, y2) {

    var parametros = {
        "x1": x1,
        "x2": x2,
        "y1": y1,
        "y2": y2
    };

    $.ajax({
        data: parametros,
        url: './Analysis/AnalysisDataTeacher.php',
        type: 'post',
        beforeSend: function () {
            
        },
        success: function (response) {
            $("#responseTeacher").html('El tipo de profesor es ' + response);
        },
        error: function () {

        }
        
    });

}

function calculateTypeTeacher() {

    x1 = parseInt(document.teacher.ageT.value) + parseInt(document.teacher.genderT.value);
    x2 = parseInt(document.teacher.evaluationT.value) + parseInt(document.teacher.quantityT.value);
    y1 = parseInt(document.teacher.disciplineT.value) + parseInt(document.teacher.useComputerT.value);
    y2 = parseInt(document.teacher.useTecWeb.value) + parseInt(document.teacher.useSiteWeb.value);
    sendInformationTeacher(x1, x2, y1, y2);
}
