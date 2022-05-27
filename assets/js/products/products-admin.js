$(document).ready(function() {

    //select button SAVE in all cards
    $(".mb-2.mt-2.selection-option :nth-child(1)").each(
        function(e) {
            let idBtn = $(this).attr('id').replace('savebtn', '');
            let idProduct = (parseInt(idBtn));

            $(this).click(
                function(e) {
                    uploadProduct(idProduct);
                }
            );

        }
    );

    //select button DELETE in all cards
    $(".mb-2.mt-2.selection-option :nth-child(2)").each(
        function(e) {
            let idBtn = $(this).attr('id').replace('deletebtn', '');
            let idProduct = (parseInt(idBtn));

            $(this).click(
                function(e) {
                    deleteProduct(idProduct);
                }
            );

        }
    );

});



function uploadProduct(id) {
    let warningSelected = "#warningsLabel" + id;
    let qtnUpload = "#qtn" + id;
    let qtn = $(qtnUpload).val();
    let action = 1;
    
    $(warningSelected).text("");
    $(warningSelected).fadeIn();
    if ($.isNumeric(qtn) && qtn >= 0) {

        $.post('utils/uploadProduct.php', { "action": action, "id": id, "qtn": qtn },
            function(returnedData) {
                
            }).fail(function() {
                document.location.href = "/DrinkVibes/errors.php?errorNum= ";
        });
        

        $(warningSelected).text("Saved").css("color", "green");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
    } else {
        $(warningSelected).text("Incoret Format").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
    }
}

function deleteProduct(id) {
    let cardDelete = "#card" + id;
    let action = 2;
    

    $(cardDelete).remove();

    $.post('utils/uploadProduct.php', { "action": action, "id": id },
        function(returnedData) {
            
        }).fail(function() {
            document.location.href = "/DrinkVibes/errors.php?errorNum= ";
    });

}


function fade_out(id) {
    $(id).fadeOut(1000, "linear");
}