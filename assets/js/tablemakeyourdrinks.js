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
        
        var disponibility;
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
          
            disponibility = this.responseText;          
            console.log(disponibility);  
        } 
        xhttp.open("GET", "submitIngredient.php?id="+id,false );
        xhttp.send();

       // console.log(jQuery.type(isDisponibility));
       // console.log(jQuery.type(quantity));
        
        if(parseInt(disponibility) > 0 ){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("ingredientTable").innerHTML = this.responseText;            
            }
            xhttp.open("GET", "gettable.php?action="+ action + "&qtn="+quantity+"&id="+id );
            xhttp.send();
            console.log("ciao");
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
    var type = "handmadedrink";
    var qtn = $("#qtnShoppingCart").val();
    if($.isNumeric(qtn) && $(inputSelected).val()>0){

    }
    xhttp.onload = function() {
           //document.getElementById("ingredientTable").innerHTML = this.responseText;            
    }
        
    xhttp.open("GET", "shoppingcart.php?type="+ type+ "&qtn="+ qtn);
    xhttp.send();
}