
function sendInformation(CA, EC, EA, OR) {
    var parametros = {
        "CA": CA,
        "EC": EC,
        "EA": EA,
        "OR": OR
    };

    $.ajax({
        data: parametros,
        url: './Analysis/AnalysisDataStyles.php',
        type: 'post',
        beforeSend: function () {
            
        },
        success: function (response) {
            $("#response").html('Su estilo de aprendizaje es: ' + response);
        },
        error: function () {

        }   
    });
}

function calcular() {
    ec = parseInt(document.estilo.c5.value) + parseInt(document.estilo.c9.value) + parseInt(document.estilo.c13.value) + parseInt(document.estilo.c17.value) + parseInt(document.estilo.c25.value) + parseInt(document.estilo.c29.value);
    or = parseInt(document.estilo.c2.value) + parseInt(document.estilo.c10.value) + parseInt(document.estilo.c22.value) + parseInt(document.estilo.c26.value) + parseInt(document.estilo.c30.value) + parseInt(document.estilo.c34.value);
    ca = parseInt(document.estilo.c7.value) + parseInt(document.estilo.c11.value) + parseInt(document.estilo.c15.value) + parseInt(document.estilo.c19.value) + parseInt(document.estilo.c31.value) + parseInt(document.estilo.c35.value);
    ea = parseInt(document.estilo.c4.value) + parseInt(document.estilo.c12.value) + parseInt(document.estilo.c24.value) + parseInt(document.estilo.c28.value) + parseInt(document.estilo.c32.value) + parseInt(document.estilo.c36.value);
    sendInformation(ca, ec, ea, or);
}
