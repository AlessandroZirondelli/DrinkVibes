$(document).ready(function () {
    $("#formIdProduct").on("submit", checkProduct);
    $("#image").change(function () {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#imgProduct').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    $("#radioButtonWine").click(function () {
        changeRadioButton("Wine");
    });

    $("#radioButtonBeverage").click(function () {
        changeRadioButton('Beverage');
    });

    $("#radioButtonDrink").click(function () {
        changeRadioButton('Drink');
    });

});

function changeRadioButton(tipology) {
    let radioButtonTipology = "#radioButton" + tipology;
    $("#tipology input").each(function () {
        $(this).removeAttr('checked');
    });
    $(radioButtonTipology).attr('checked', 'checked');
    printRadio();
}

function printRadio() {
    let radioBtnLiquid = "#radioButton";
    console.log($("#radioButton").val());

}

function checkProduct() {
    let warningSelected = "#warningsLabel";
    let errorEmpty = false;
    let errorNum = false;

    $(warningSelected).text("");
    $(warningSelected).fadeIn();

    $("#name").css("border-color", "black");
    $("#qtn").css("border-color", "black");
    $("#price").css("border-color", "black");

    if ($("#name").val() == "") {
        errorEmpty = true;
        $("#name").css("border-color", "red")
            .css("border-width", "3px");
    }
    if ($("#qtn").val() !== "") {
        if (!($.isNumeric($("#qtn").val()))) {
            errorNum = true;
            $("#qtn").css("border-color", "red").css("border-width", "3px");
        }
    } else {
        errorEmpty = true;
        $("#qtn").css("border-color", "red").css("border-width", "3px");
    }
    if (($("#price").val() !== "")) {
        if (!($.isNumeric($("#price").val()))) {
            errorNum = true;
            $("#price").css("border-color", "red").css("border-width", "3px");
        }
    } else {
        errorEmpty = true;
        $("#price").css("border-color", "red").css("border-width", "3px");
    }

    if (errorEmpty == true) {
        $(warningSelected).text("Error! Empty field").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function () { fade_out(warningSelected); }, 2000);
    } else if (errorNum == true) {
        $(warningSelected).text("Error! Not a number").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function () { fade_out(warningSelected); }, 2000);
    }
    return errorEmpty == false && errorNum == false;
}

function fade_out(id) {
    $(id).fadeOut(1000, "linear");
}