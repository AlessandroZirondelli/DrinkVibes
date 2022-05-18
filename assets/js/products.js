/*function submitQuantity(id) {
    var inputSelected = "#qtn" + id;
    var buttonSelected = "#btn" + id;
    var nameSelected = "#name" + id;
    var warningSelected = "#warningsLabel" + id;
    
   
    if ($.isNumeric($(inputSelected).val()) && $(inputSelected).val() > 0) {
        console.log("Entrato");
        var quantity = $(inputSelected).val();
        var action = 3;
        var actionUpdate = 1;
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
        
            const xhttp1 = new XMLHttpRequest();
            
            //$(inputSelected).css("border-color", "green").css("border-width", "3px");
            
            xhttp1.onload = function() {
                console.log(this.responseText);
            }
            xhttp1.open("GET", "utils/updateProduct.php?action=" + actionUpdate + "&qtn=" + quantity + "&id=" + id);
            xhttp1.send();

            //se è sold out
            if (parseInt(disponibility) == parseInt(quantity)) {
                $(nameSelected).text($(nameSelected).text() + " [Sold out]");
                $(buttonSelected).attr("disabled", "disabled");
                $(inputSelected).attr("disabled", "disabled");
            }
            $(warningSelected).text("Added to cart shopping").css("color", "green");
            $(warningSelected).fadeIn();
            setTimeout(function() { fade_out(warningSelected); }, 2000);
            $(inputSelected).val(""); 
            updateQtnDescription(id);
        } else {
            //richiesta quantità maggiore a quella disponibile
            $(inputSelected).css("border-color", "red").css("border-width", "3px");
            if ($(inputSelected).val() > parseInt(disponibility)) { // Se la quantità richiesta è maggiore di quella disponibile 
                $(warningSelected).text("Too many quantity required, max disponibility" + disponibility).css("color", "red");
                $(warningSelected).fadeIn();
                setTimeout(function() { fade_out(warningSelected); }, 2000);
            }
        }
    } else {
        //non numerico o minore o uguale di 0
        $(inputSelected).css("border-color", "red")
            .css("border-width", "3px");


    }
}*/
function submitQuantity(id) {
    var inputSelected = "#qtn" + id;
    var warningSelected = "#warningsLabel" + id;
    
    if ($.isNumeric($(inputSelected).val()) && $(inputSelected).val() > 0) {
        var action = 3;
        var disponibility;

        $(warningSelected).text("");
        $(warningSelected).fadeIn();
        $(inputSelected).css("border-color", "black");

        $.post('submit.php', { "action": action, "id" : id}, 
            function(returnedData){
                
                disponibility = returnedData;
                updateQtn(disponibility, id);
            }).fail(function(xhr, status, error){
                console.log("xhr:" + xhr.responseText + " " + "error:" + error + " " + "status:" + status);
                console.log("error");
            });
    } else {
        //non numerico o minore o uguale di 0
        $(inputSelected).css("border-color", "red")
            .css("border-width", "3px");
    }
}
function updateQtn(disponibility,id){
    var action = 1;
    var inputSelected = "#qtn" + id;
    var buttonSelected = "#btn" + id;
    var nameSelected = "#name" + id;
    var warningSelected = "#warningsLabel" + id;
    var quantity = $(inputSelected).val();

    if (parseInt(disponibility) > 0 && $(inputSelected).val() <= parseInt(disponibility)) {
        console.log("SONO BRAVO 2");
        const xhttp1 = new XMLHttpRequest();
        
        //$(inputSelected).css("border-color", "green").css("border-width", "3px");
        $.post('utils/updateProduct.php', { "action": action, "id" : id, "qtn" : quantity}, 
        function(returnedData){
            
         //   disponibility = returnedData;
           // updateQtn(disponibility, id);
           updateQtnDescription(id);
        }).fail(function(xhr, status, error){
            console.log("error:" + error + " " + "status:" + status);
        });

       /* xhttp1.onload = function() {
            console.log(this.responseText);
        }
        xhttp1.open("GET", "utils/updateProduct.php?action=" + actionUpdate + "&qtn=" + quantity + "&id=" + id);
        xhttp1.send();*/

        

        //se è sold out
        if (parseInt(disponibility) == parseInt(quantity)) {
            $(nameSelected).text($(nameSelected).text() + " [Sold out]");
            $(buttonSelected).attr("disabled", "disabled");
            $(inputSelected).attr("disabled", "disabled");
        }
        $(warningSelected).text("Added to cart shopping").css("color", "green");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
        $(inputSelected).val(""); 
        //updateQtnDescription(id);

    } else {
        //richiesta quantità maggiore a quella disponibile
        $(inputSelected).css("border-color", "red").css("border-width", "3px");
        if ($(inputSelected).val() > parseInt(disponibility)) { // Se la quantità richiesta è maggiore di quella disponibile 
            $(warningSelected).text("Too many quantity required, max disponibility" + disponibility).css("color", "red");
            $(warningSelected).fadeIn();
            setTimeout(function() { fade_out(warningSelected); }, 2000);
        }
    }
}
function updateQtnDescription(id){
    var idQuantityDescription = "#quantityDescription" + id;
    const xhttp = new XMLHttpRequest();
    var disponibility = 0;
    var action = 3;
    
    $.post('submit.php', { "action": action, "id" : id}, 
    function(returnedData){
        console.log("Cococrico product");
        console.log(returnedData);
        disponibility = returnedData;
        $(idQuantityDescription).text(disponibility);
    }).fail(function(){
        console.log("error");
    });


    /*xhttp.onload = function() { // Prende la quantità disponibile del prodotto
        disponibility = this.responseText;
    }
    xhttp.open("GET", "submit.php?action=" + action + "&id=" + id, false);
    xhttp.send();*/
    //$(idQuantityDescription).text(disponibility);
}
function fade_out(id) {
    $(id).fadeOut(1000, "linear");
} 