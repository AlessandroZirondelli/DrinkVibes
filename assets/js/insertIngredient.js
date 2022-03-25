function addIngredient(){
    
  
}


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
    var imageIng = "assets/img/i.png";
    var nameIng = "";
    var descIng = "";
    var qtnIng = "";
    var priceIng = "";
    var categoIng = "";
    var tipologIng = "";
    var action = 3;
    if($("#image").val() !== ""){
        imageIng = "./upload/" +  $("#image").val().replace(/.*(\/|\\)/, ''); 
    }
    if($("#name").val() !== ""){
        nameIng = $("#name").val();
    }
    if($("#textArea").val() !== ""){
        descIng =  $("#textArea").val();
      
    }
    if($("#qtn").val() !== ""){
        qtnIng =  $("#qtn").val();
        
    }
    if($("#price").val() !== ""){
        priceIng =  $("#price").val();
        
    }
    
    categoIng = $("#category").children().children( '[checked]' ).val();
    if (categoIng === "Liquid"){
        tipologIng = $("#tipology").children().children( '[checked]' ).val();
    }else{
        tipologIng = "";
    }
    console.log("Immagine: " + imageIng);
    console.log("Name: " + nameIng);
    console.log("textArea: " + descIng);
    console.log("Quantity: " + qtnIng);
    console.log("Price: " + priceIng);
    console.log("Category: " + categoIng);
    console.log("Tipology: " + tipologIng);
   
   
    const xhttp = new XMLHttpRequest();
    
    xhttp.onload = function() {
       
    }
    xhttp.open("GET", "uploadIngredient.php?action="+ action + "&imageurl=" + imageIng + "&name=" + nameIng + "&descr=" + descIng + "&qtn=" + qtnIng + "&price=" + priceIng + "&category=" +categoIng +"&tipology=" + tipologIng);
    xhttp.send();
    
}
function insertTipology(){

}
function deleteTipology(){


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