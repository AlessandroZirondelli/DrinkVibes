$(document).ready(function(){
    
});


function changeCheckbox($id){
    if($("#cb"+$id).attr('checked') === "checked"){
        console.log("No");
        $("#cb"+$id).removeAttr('checked');
    }else{
        console.log("Yes");
        $("#cb"+$id).attr('checked', 'checked');
    }
}
function submitQuantity(id){
    var inputSelected = "#qtn" + id;  
    var buttonSelected = "#btn" + id;
    var nameSelected = "#name" + id;
    var action = 1;

    if($.isNumeric($(inputSelected).val()) && $(inputSelected).val()>0){
        $(inputSelected).css("border-color","black");
        var quantity = $(inputSelected).val();
        var action = 1;
        var disponibility;
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
          
            disponibility = this.responseText;          
            console.log(disponibility);  
        } 
        xhttp.open("GET", "submit.php?action=" + action + "&id=" + id,false );
        xhttp.send();

        if(parseInt(disponibility) > 0 && $(inputSelected).val() <=  parseInt(disponibility) ){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("ingredientTable").innerHTML = this.responseText;            
            }
            xhttp.open("GET", "gettable.php?action="+ action + "&qtn="+quantity+"&id="+id );
            xhttp.send();
          
            if(parseInt(disponibility) == parseInt(quantity)){   
                sendNotificartionBySoldout(id,$(nameSelected).text()); // metterlo solo quando hai comprato
                $(nameSelected).text($(nameSelected).text() +" - Sold out");
                $(buttonSelected).attr("disabled","disabled");
                $(inputSelected).attr("disabled","disabled");
                //$(inputSelected).attr("disabled","disabled").css("border-color","grey");
            }
        }else{
            $(inputSelected).css("border-color","red")
            .css("border-width","3px");
        }
    }else{
        $(inputSelected).css("border-color","red")
                        .css("border-width","3px");     
    }
}
function deleteRow() {
    var action = 2;
    const arrayDeleteId = [];

    $('[checked="checked"]').each(function() {
        arrayDeleteId.push($(this).val());
        $(this).parents("tr").remove();

        var id = $(this).val();
        var inputSelected = "#qtn" + id;  
        var buttonSelected = "#btn" + id;
        var nameSelected = "#name" + id;

        $(nameSelected).text($(nameSelected).text().replace(" - Sold out", ""));
        $(buttonSelected).removeAttr("disabled");
        $(inputSelected).removeAttr("disabled");
    });    
   
   
    if(arrayDeleteId.length!=0){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("ingredientTable").innerHTML = this.responseText;            
        }
        
        xhttp.open("GET", "gettable.php?action="+ action + "&id="+ JSON.stringify(arrayDeleteId) );
        xhttp.send();
    }
}
function addShoppingCart(){
    const xhttp = new XMLHttpRequest();
    const xhttp1 = new XMLHttpRequest();
    var inputSelected = "#qtnShoppingCart"; 
    var type = "handmadedrink";
    var qtn = $(inputSelected).val();
    var action = 2;
    if($.isNumeric(qtn) && qtn>0){
        $(inputSelected).css("border-color","black");
        xhttp.onload = function() {
            var returnString = this.responseText.replace(/(\r\n|\n|\r)/gm,"");
            console.log(returnString);
            if("Added to shopping cart" == returnString ){
                //document.getElementById("textShoppingCart").innerHTML = this.responseText;
                $("#textShoppingCart").text(this.responseText).css("color","green");
                $("#textShoppingCart").fadeIn();
                setTimeout(fade_out, 2000);
               
            }else{
                setTimeout(fade_out, 2000);
                console.log("red");
                $("#textShoppingCart").text(this.responseText).css("color","red");
            }
        }
        console.log("entro");
        xhttp.open("GET", "submit.php?action="+ action + "&qtn="+ qtn,false);
        xhttp.send();
    }else{
        $(inputSelected).css("border-color","red")
                        .css("border-width","3px");

    }

    xhttp.onload = function() {
           document.getElementById("sessionTable").innerHTML = this.responseText;            
    }
        
    xhttp.open("GET", "shoppingcart.php?",false);
    xhttp.send();
}
function fade_out() {
    $("#textShoppingCart").fadeOut(1000, "linear");
} 