$(document).ready(function () {

    $(".mb-2.mt-2.selection-option :nth-child(1)") //select button save in all cards
        .each(
            function (index) {
                const idBtn = $(this).attr('id').replace('savebtn', '');
                const idProduct = (parseInt(idBtn));
                $(this).click(
                    function (e) {
                        uploadIngredient(idProduct);
                    }
                );
            }
        );

    $(".mb-2.mt-2.selection-option :nth-child(2)") //select button delete in all cards
        .each(
            function (index) {
                const idBtn = $(this).attr('id').replace('deletebtn', '');
                const idProduct = (parseInt(idBtn));
                $(this).click(
                    function (e) {
                        deleteIngredient(idProduct);
                    }
                );
            }
        );

});


function uploadIngredient(id) {
    let warningSelected = "#warningsLabel" + id;
    const qtnUpload = "#qtn" + id;
    const qtn = $(qtnUpload).val();
    const action = 1;

    $(warningSelected).text("");
    $(warningSelected).fadeIn();
    if ($.isNumeric(qtn) && qtn >= 0) {
        $.post('uploadIngredientttt.php', { "action": action, "id": id, "qtn": qtn },
            function (returnedData) {
                
            }).fail(function () {
                document.location.href = "/DrinkVibes/errors.php?errorNum= ";
            });

        $(warningSelected).text("Saved").css("color", "green");
        $(warningSelected).fadeIn();
        setTimeout(function () { fade_out(warningSelected); }, 2000);
    }
}

function deleteIngredient(id) {
    const cardDelete = "#card" + id;
    const action = 2;

    $(cardDelete).remove();

    $.post('uploadIngredient.php', { "action": action, "id": id },
        function (returnedData) {
            
        }).fail(function () {
            document.location.href = "/DrinkVibes/errors.php?errorNum= ";
        });

}


function fade_out(id) {
    $(id).fadeOut(1000, "linear");
} 