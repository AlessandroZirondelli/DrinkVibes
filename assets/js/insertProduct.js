$(document).ready(function() {
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

function changeRadioButtonTipology(tipology) {
    var radioButtonTipology = "#radioButton" + tipology;

    $("#tipology input").each(function() {
        $(this).removeAttr('checked');
    });
    $(radioButtonTipology).attr('checked', 'checked');
}


function addProduct() {
    var warningSelected = "#warningsLabel" + id;
    $(warningSelected).text("");
    $(warningSelected).fadeIn();

    var imgProduct = "assets/img/i.png";
    var nameProduct = "";
    var descProduct = "";
    var qtnProduct = "";
    var priceProduct = "";
    var typeProduct = "";
    var action = 3;

    if ($("#image").val() !== "") {
        imgProduct = "./upload/" + $("#image").val().replace(/.*(\/|\\)/, '');
    }
    if ($("#name").val() !== "") {
        nameProduct = $("#name").val();
    } else {
        $(warningSelected).text("Invalide Name").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
    }
    if ($("#textArea").val() !== "") {
        descProduct = $("#textArea").val();

    }
    if ($("#qtn").val() !== "") {
        qtnProduct = $("#qtn").val();
    } else {
        $(warningSelected).text("Invalide quantity").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
    }
    if ($("#price").val() !== "") {
        priceProduct = $("#price").val();

    } else {
        $(warningSelected).text("Invalide price").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
    }

    typeProduct = $("#tipology").children().children('[checked]').val();

    console.log("Immagine: " + imgProduct);
    console.log("Name: " + nameProduct);
    console.log("textArea: " + descProduct);
    console.log("Quantity: " + qtnProduct);
    console.log("Price: " + priceProduct);
    console.log("Tipology: " + typeProduct);


    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {

        }
        //carica le nuove modifiche dei prodotti o ne aggiunge di nuovi a seconda del caso in cui si trova
    xhttp.open("GET", "uploadProduct.php?action=" + action + "&imageurl=" + imgProduct + "&name=" + nameProduct + "&descr=" + descProduct + "&qtn=" + qtnProduct + "&price=" + priceProduct + "&tipology=" + typeProduct);
    xhttp.send();


}


function fade_out(id) {
    $(id).fadeOut(1000, "linear");
}