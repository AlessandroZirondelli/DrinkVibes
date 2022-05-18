$(document).ready(function () {
    $("div.selection-option :nth-child(1)") //select button add in all cards
        .each(
            function (index) {
                const idBtn = $(this).attr('id').replace('btn', '');
                const idProduct = (parseInt(idBtn));
                $(this).click(
                    function (e) {
                        submitQuantity(idProduct);
                    }
                );
            }
        );
});


function submitQuantity(id) {
    const inputSelected = "#qtn" + id;
    const warningSelected = "#warningsLabel" + id;

    if ($.isNumeric($(inputSelected).val()) && $(inputSelected).val() > 0) {
        const action = 3;
        let disponibility;

        $(warningSelected).text("");
        $(warningSelected).fadeIn();
        $(inputSelected).css("border-color", "black");

        $.post('submit.php', { "action": action, "id": id },
            function (returnedData) {

                disponibility = returnedData;
                updateQtn(disponibility, id);
            }).fail(function (xhr, status, error) {
                console.log("xhr:" + xhr.responseText + " " + "error:" + error + " " + "status:" + status);
                console.log("error");
            });
    } else {
        //not numeric or less or uqual to 0
        $(inputSelected).css("border-color", "red")
            .css("border-width", "3px");
    }
}

function updateQtn(disponibility, id) {
    const action = 1;
    const inputSelected = "#qtn" + id;
    const buttonSelected = "#btn" + id;
    const nameSelected = "#name" + id;
    const warningSelected = "#warningsLabel" + id;
    let quantity = $(inputSelected).val();

    if (parseInt(disponibility) > 0 && $(inputSelected).val() <= parseInt(disponibility)) {
        console.log("SONO BRAVO 2");
        const xhttp1 = new XMLHttpRequest();
        //$(inputSelected).css("border-color", "green").css("border-width", "3px");
        $.post('utils/updateProduct.php', { "action": action, "id" : id, "qtn" : quantity}, 
        function(returnedData){
           updateQtnDescription(id);
        }).fail(function(xhr, status, error){
            console.log("error:" + error + " " + "status:" + status);
        });

      

        //if it's sold out
        if (parseInt(disponibility) == parseInt(quantity)) {
            $(nameSelected).text($(nameSelected).text() + " [Sold out]");
            $(buttonSelected).attr("disabled", "disabled");
            $(inputSelected).attr("disabled", "disabled");
        }
        $(warningSelected).text("Added to cart shopping").css("color", "green");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
        $(inputSelected).val(""); 
       

    } else {

        $(inputSelected).css("border-color", "red").css("border-width", "3px");
        if ($(inputSelected).val() > parseInt(disponibility)) { // if require more quantity than availabilty
            $(warningSelected).text("Too many quantity required, max disponibility" + disponibility).css("color", "red");
            $(warningSelected).fadeIn();
            setTimeout(function () { fade_out(warningSelected); }, 2000);
        }
    }
}
function updateQtnDescription(id) {
    var idQuantityDescription = "#quantityDescription" + id;
    const xhttp = new XMLHttpRequest();
    var disponibility = 0;
    var action = 3;

    $.post('submit.php', { "action": action, "id": id },
        function (returnedData) {
            console.log("Cococrico product");
            console.log(returnedData);
            disponibility = returnedData;
            $(idQuantityDescription).text(disponibility);
        }).fail(function () {
            console.log("error");
        });
}
function fade_out(id) {
    $(id).fadeOut(1000, "linear");
} 