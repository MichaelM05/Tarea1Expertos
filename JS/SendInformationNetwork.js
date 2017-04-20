
function sendInformationNetwork(x1, x2, y1,y2) {
    var parametros = {
        "x1": x1,
        "x2": x2,
        "y1": y1,
        "y2": y2
    };

    $.ajax({
        data: parametros,
        url: './Analysis/AnalysisDataNetwork.php',
        type: 'post',
        beforeSend: function () {
            
        },
        success: function (response) {
            $("#responseNetwork").html('El area es de tipo ' + response);
        },
        error: function () {

        }
        
    });
}

function calculateNetwork() {

    x1 = document.network.fiability.value;
    x2 = document.network.numberLink.value;
    y1 = document.network.capacity.value;
    y2 = document.network.coste.value;

    sendInformationNetwork(x1,x2,y1,y2);
}
