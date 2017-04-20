
function sendInformationGender(mean, style, enclosure) {
    var parametros = {
        "mean": mean,
        "style": style,
        "enclosure": enclosure
    };
    $.ajax({
        data: parametros,
        url: './Analysis/AnalysisDataGender.php',
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            $("#responseGender").html('Su sexo es ' + response);
        },
        error: function () {
            alert("nada");
        }
    });

}
function calcularGender() {

    style = document.gender.styleAG.value;
    mean = document.gender.meanG.value;
    enclosure = document.gender.enclosureG.value;
    if (mean.length > 0 && !isNaN(mean)) {
        sendInformationGender(mean, style, enclosure);
    } else {
        document.getElementById('responseGender').innerHTML = "Debe ingresar todos los datos";
    }
}
