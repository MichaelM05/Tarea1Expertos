
function sendInformationStyle(mean, enclosure, gender) {

    var parametros = {
        "mean": mean,
        "enclosure": enclosure,
        "gender": gender
    };
    $.ajax({
        data: parametros,
        url: './Analysis/AnalysisDataStyle.php',
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            $("#responseStyle").html('Su estilo de aprendizaje es ' + response);
        },
        error: function () {
            alert('no');
        }
    });

}
function calcularStyle() {

    enclosure = document.style.enclosureS.value;
    mean = document.style.meanS.value;
    gender = document.style.genderS.value;
    if (mean.length > 0 && !isNaN(mean)) {
        sendInformationStyle(mean, enclosure, gender);
    } else {
        document.getElementById('responseStyle').innerHTML = "Debe ingresar todos los datos";
    }
}
