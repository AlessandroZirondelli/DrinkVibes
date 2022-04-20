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
    var imageIng = "assets/img/i.png";
    var nameIng = "";
    var descIng = "";
    var qtnIng = "";
    var priceIng = "";
    var categoIng = "";
    var tipologIng = "";
    var error = false;
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
        error = true;
        $("#name").css("border-color","red")
                .css("border-width","3px");
    }
    if($("#textArea").val() !== ""){
        descIng =  $("#textArea").val();
    }
    if(($("#qtn").val() !== "") && $.isNumeric($("#qtn").val())){
        qtnIng =  $("#qtn").val();
    }else{
        error = true;
        $("#qtn").css("border-color","red")
        .css("border-width","3px");
    }
    if(($("#price").val() !== "") && $.isNumeric($("#price").val())){
        priceIng =  $("#price").val();
    }else{
        error = true;
        $("#price").css("border-color","red")
        .css("border-width","3px");
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
    console.log(error);
    if(error != true){
        console.log("Entrato");
        xhttp.onload = function() {
       
        }
        xhttp.open("GET", "uploadIngredient.php?action="+ action + "&imageurl=" + imageIng + "&name=" + nameIng + "&descr=" + descIng + "&qtn=" + qtnIng + "&price=" + priceIng + "&category=" +categoIng +"&tipology=" + tipologIng);
        xhttp.send();
        
    }
    
        
   return error;
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