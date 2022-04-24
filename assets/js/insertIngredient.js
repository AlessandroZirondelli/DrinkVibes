$("#formId").on("submit", function () {
    $.ajax({
        url: 'uploadImageIngredient.php',
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
function changeRadioButtonTipology(tipology){
    var radioButtonTipology = "#radioButton" + tipology;
    
    $("#tipology input").each(function() {
        $(this).removeAttr('checked');
    }); 
    $(radioButtonTipology).attr('checked', 'checked');
}


function changeRadioButtonCategory(category){
    var radioButtonCategory = "#radioButton" + category;
    if(category === "Liquid"){
        $("#tipology").show();
    }else{
        $("#tipology").hide();
    }
    $("#category input").each(function() {
        $(this).removeAttr('checked');
    }); 
    $(radioButtonCategory).attr('checked', 'checked');
   
}
function addIngredient(){
    const xhttp = new XMLHttpRequest();
    var warningSelected = "#warningsLabel";
    $(warningSelected).text("");
    $(warningSelected).fadeIn();
    var imageIng = "assets/img/i.png";
    var nameIng = "";
    var descIng = "";
    var qtnIng = "";
    var priceIng = "";
    var categoIng = "";
    var tipologIng = "";
    var errorEmpty = false;
    var errorNum = false;
    var action = 3;
    console.log("add");

    $("#name").css("border-color","black");
    $("#qtn").css("border-color","black");
    
    $("#price").css("border-color","black");
    


    if($("#image").val() !== ""){
        imageIng = "./upload/" +  $("#image").val().replace(/.*(\/|\\)/, ''); 
    }
    if($("#name").val() !== ""){
        nameIng = $("#name").val();
    }else{
        errorEmpty = true;
        $("#name").css("border-color","red")
                .css("border-width","3px");
    }
    if($("#textArea").val() !== ""){
        descIng =  $("#textArea").val();
    }
    if($("#qtn").val() !== ""){
        qtnIng =  $("#qtn").val();
        if(!($.isNumeric($("#qtn").val()))){
            errorNum = true;
            $("#qtn").css("border-color","red").css("border-width","3px");
        }
    }else{
        errorEmpty = true;
        $("#qtn").css("border-color","red")
        .css("border-width","3px");
    }
    if($("#price").val() !== ""){
        priceIng =  $("#price").val();
        if( !($.isNumeric($("#price").val()))){
            errorNum = true;
            $("#price").css("border-color","red").css("border-width","3px");
        }
    }else{
        errorEmpty = true;
        $("#price").css("border-color","red").css("border-width","3px");
    }
    
    categoIng = $("#category").children().children( '[checked]' ).val();
    if (categoIng === "Liquid"){
        tipologIng = $("#tipology").children().children( '[checked]' ).val();
    }else{
        tipologIng = "";
    }
    /*console.log("Immagine: " + imageIng);
    console.log("Name: " + nameIng);
    console.log("textArea: " + descIng);
    console.log("Quantity: " + qtnIng);
    console.log("Price: " + priceIng);
    console.log("Category: " + categoIng);
    console.log("Tipology: " + tipologIng);
   */
    
    if(errorEmpty == false && errorNum == false){
        console.log("Entrato");
        xhttp.onload = function() {
       
        }
        xhttp.open("GET", "uploadIngredient.php?action="+ action + "&imageurl=" + imageIng + "&name=" + nameIng + "&descr=" + descIng + "&qtn=" + qtnIng + "&price=" + priceIng + "&category=" +categoIng +"&tipology=" + tipologIng);
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
        
    
    return errorEmpty || errorNum;
}

function fade_out(id) {
    $(id).fadeOut(1000, "linear");
}

function printRadio(){
    var radioBtnLiquid ="#radioButtonLiquid" ;
    var radioBtnUnit = "#radioButtonUnit";
    if($(radioBtnLiquid).attr('checked') === "checked"){
        console.log($(radioBtnLiquid).val());
    }else{
        console.log($(radioBtnUnit).val());
    }
}
$(document).ready(function(){
    let form = document.getElementById('formId');
    
    form.addEventListener('submit', function(event) {
        console.log("form");
        event.preventDefault();
        let form = event.target;
        let errors = addIngredient();
        
    //do all of the error checking here, if there's an error, set errors to true
        if(!errors) {
            form.submit();
        }
    })
    $("#tipology").hide();
    $("#image").change(function () {
        
        if (this.files && this.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {

                $('#imgIngredient').attr('src', e.target.result);

            }

            reader.readAsDataURL(this.files[0]);

        }

    });
});