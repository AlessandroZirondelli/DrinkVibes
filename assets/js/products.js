function submitQuantity(id) {
    var inputSelected = "#qtn" + id;
    var buttonSelected = "#btn" + id;
    var nameSelected = "#name" + id;
    var warningSelected = "#warningsLabel" + id;
    var action = 1;

    if ($.isNumeric($(inputSelected).val()) && $(inputSelected).val() > 0) {
        var quantity = $(inputSelected).val();
        var action = 1;
        var disponibility;

        const xhttp = new XMLHttpRequest();

        $(warningSelected).text("");
        $(warningSelected).fadeIn();
        $(inputSelected).css("border-color", "black");

        xhttp.onload = function() { // Prende la quantità disponibile del prodotto
            disponibility = this.responseText;
        }
        xhttp.open("GET", "submit.php?action=" + action + "&id=" + id, false);
        xhttp.send();

        //quantità richiesta minore o uguale a quella disponibile
        if (parseInt(disponibility) > 0 && $(inputSelected).val() <= parseInt(disponibility)) {

            const xhttp = new XMLHttpRequest();

            $(inputSelected).css("border-color", "green").css("border-width", "3px");
            $(warningSelected).text("Quantity correct").css("color", "green");
            $(warningSelected).fadeIn();
            setTimeout(function() { fade_out(warningSelected); }, 2000);

            xhttp.onload = function() {
                console.log(this.responseText);
            }
            xhttp.open("GET", "gettable.php?action=" + action + "&qtn=" + quantity + "&id=" + id);
            xhttp.send();

            //se è sold out
            if (parseInt(disponibility) == parseInt(quantity)) {
                $(nameSelected).text($(nameSelected).text() + " - Sold out");
                $(buttonSelected).attr("disabled", "disabled");
                $(inputSelected).attr("disabled", "disabled");
            }
        } else {

            //richiesta quantità maggiore a quella disponibile
            $(inputSelected).css("border-color", "red").css("border-width", "3px");
            if ($(inputSelected).val() > parseInt(disponibility)) { // Se la quantità richiesta è maggiore di quella disponibile 
                $(warningSelected).text("Too many quantity required, max disponibility" + disponibility).css("border-color", "red");
                $(warningSelected).fadeIn();
                //setTimeout(function() { fade_out(warningSelected); }, 2000);
            }
        }
    } else {
        //non numerico o minore o uguale di 0
        $(inputSelected).css("border-color", "red")
            .css("border-width", "3px");


    }
}