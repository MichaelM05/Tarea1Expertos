
function sendInformationEnclosure(mean, style, gender) {

    var parametros = {
        "mean": mean,
        "style": style,
        "gender": gender
    };
    $.ajax({
        data: parametros,
        url: './Analysis/AnalysisDataEnclosure.php',
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            $("#responseEnclosure").html('Su recinto es ' + response);
        },
        error: function () {
            alert('no');
        }
    });

}


function calcularEnclosure() {
    style = document.enclosure.styleA.value;
    mean = document.enclosure.mean.value;
    gender = document.enclosure.gender.value;
    if (mean.length > 0 && !isNaN(mean)) {
        sendInformationEnclosure(mean, style, gender);
    } else {
        document.getElementById('responseEnclosure').innerHTML = "Debe ingresar todos los datos";
    }
}

