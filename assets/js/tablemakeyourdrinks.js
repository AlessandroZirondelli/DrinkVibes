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
    var action = 1;

    if($.isNumeric($(inputSelected).val()) && $(inputSelected).val()!=0){
        $(inputSelected).css("border-color","black");
        var quantity = $(inputSelected).val();
        
        var isDisponibility;
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
          
            isDisponibility = this.responseText;          
            console.log(isDisponibility);  
        } 
        xhttp.open("GET", "submitIngredient.php?qtn="+quantity+"&id="+id,false );
        xhttp.send();

        console.log(isDisponibility);
        if(parseInt(isDisponibility) == 1 ){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("ingredientTable").innerHTML = this.responseText;            
            }
        
            xhttp.open("GET", "gettable.php?action="+ action + "&qtn="+quantity+"&id="+id );
            xhttp.send();
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
    xhttp.onload = function() {
           //document.getElementById("ingredientTable").innerHTML = this.responseText;            
    }
        
    xhttp.open("GET", "shoppingcart.php?type="+ type+ "&qtn="+ qtn);
    xhttp.send();
}