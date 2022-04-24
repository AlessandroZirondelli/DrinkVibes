$("#formIdProduct").on("submit", function () {
    $.ajax({
        url: 'uploadImgProduct.php',
        type: 'POST',
        cache: false,
        //data: { $("#formId").serialize() },
        success: function (data) {
            alert('Success!')
        }
        , error: function (jqXHR, textStatus, err) {
            alert('text status ' + textStatus + ', err ' + err)
        }
    });
});
$(document).ready(function() {
    let form = document.getElementById('formIdProduct');
    
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        let form = event.target;
        let errors = addProduct();
    //do all of the error checking here, if there's an error, set errors to true
        if(!errors) {
            form.submit();
        }
    })
    $("#image").change(function() {

        if (this.files && this.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('#imgProduct').attr('src', e.target.result);

            }

            reader.readAsDataURL(this.files[0]);

        }

    });
});


function changeRadioButton(tipology) {
    var radioButtonTipology = "#radioButton" + tipology;

    $("#tipology input").each(function() {
        $(this).removeAttr('checked');
    });
    $(radioButtonTipology).attr('checked', 'checked');
    printRadio();
}


function printRadio(){
    var radioBtnLiquid ="#radioButton" ;
        console.log($("#radioButton").val());
   
}
function addProduct() {
    var warningSelected = "#warningsLabel";
    $(warningSelected).text("");
    $(warningSelected).fadeIn();

    const xhttp = new XMLHttpRequest();
    var imgProduct = "assets/img/i.png";
    var nameProduct = "";
    var descProduct = "";
    var qtnProduct = "";
    var priceProduct = "";
    var typeProduct = "";
    var errorEmpty = false;
    var errorNum = false;
    var action = 3;

    var warningSelected = "#warningsLabel";
    $(warningSelected).text("");
    $(warningSelected).fadeIn();

    $("#name").css("border-color","black");
    $("#qtn").css("border-color","black"); 
    $("#price").css("border-color","black");

    if ($("#image").val() !== "") {
        imgProduct = "./upload/" + $("#image").val().replace(/.*(\/|\\)/, '');
    }
    if ($("#name").val() !== "") {
        nameProduct = $("#name").val();
    } else {
        errorEmpty = true;
        $("#name").css("border-color","red")
                .css("border-width","3px");
    }
    if ($("#textArea").val() !== "") {
        descProduct = $("#textArea").val();

    }
    if ($("#qtn").val() !== "") {
        qtnProduct = $("#qtn").val();
        if(!($.isNumeric($("#qtn").val()))){
            errorNum = true;
            $("#qtn").css("border-color","red").css("border-width","3px");
        }
    } else {
        errorEmpty = true;
        $("#qtn").css("border-color","red").css("border-width","3px");
    }
    if (($("#price").val() !== "")) {
        priceProduct = $("#price").val();
        if(!($.isNumeric($("#price").val()))){
            errorNum = true;
            $("#price").css("border-color","red").css("border-width","3px");
        }
    } else {
        errorEmpty = true;
        $("#price").css("border-color","red").css("border-width","3px");
    }

    typeProduct = $("#tipology").children().children('[checked]').val();

    console.log("Immagine: " + imgProduct);
    console.log("Name: " + nameProduct);
    console.log("textArea: " + descProduct);
    console.log("Quantity: " + qtnProduct);
    console.log("Price: " + priceProduct);
    console.log("Tipology: " + typeProduct);
    console.log("errorNum" + errorNum);
    console.log("errorEmpty" + errorEmpty);

    if(errorEmpty == false && errorNum == false){
        xhttp.onload = function() {

        }
            //carica le nuove modifiche dei prodotti o ne aggiunge di nuovi a seconda del caso in cui si trova
        xhttp.open("GET", "uploadProduct.php?action=" + action + "&imageurl=" + imgProduct + "&name=" + nameProduct + "&descr=" + descProduct + "&qtn=" + qtnProduct + "&price=" + priceProduct + "&tipology=" + typeProduct);
        xhttp.send();
    }
    
    if(errorEmpty == true){
        $(warningSelected).text("Error! Empty field").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
    } else if(errorNum == true){
        $(warningSelected).text("Error! Not a number").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
    }
    
    return errorEmpty || errorNum ;
    //return false;
}


function fade_out(id) {
    $(id).fadeOut(1000, "linear");
}