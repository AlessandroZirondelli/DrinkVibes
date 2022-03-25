$( document ).ready(function() {
    totalCost();
    checkCart();
});
function checkCart(){
    var action = 6;

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if(this.responseText==0){
            $("#cardempty").show();
            $("#paycard").hide();
            $("#tableproduct").hide();
        }else{
            $("#paycard").show();
            $("#cardempty").hide();
            $("#paycard").show();
        }
    }
    
    xhttp.open("GET", "shoppingcartfunction.php?action="+ action, false );
    xhttp.send();
}
function check_qty_prod(value,id){
    console.log(value);
    console.log(id);
    var valueRead = value;
    var idCheck = id;
    var action = 8;
    var inputId = "#formProd" + id;
    
   
    const xhttp = new XMLHttpRequest();
    
    xhttp.onload = function() {
       // document.getElementById("ingredientTable").innerHTML = this.responseText; à
       var returnString = this.responseText.replace(/(\r\n|\n|\r)/gm,"");
       console.log("bla");
       console.log(returnString);         
       if($.isNumeric(returnString) ){
        
           console.log("Troppo");
           $(inputId).val(parseInt(returnString));

       }
         
    }
    xhttp.open("GET", "shoppingcartfunction.php?action="+ action + "&id="+ idCheck + "&value="+valueRead,false);
    xhttp.send();
    totalCost();
}
function check_qty(value,id){
    var valueRead = value;
    var idCheck = id;
    var action = 2;
    var inputId = "#formDrink" + id;
    
   
    const xhttp = new XMLHttpRequest();
    
    xhttp.onload = function() {
       // document.getElementById("ingredientTable").innerHTML = this.responseText; à
       var returnString = this.responseText.replace(/(\r\n|\n|\r)/gm,"");
       console.log(returnString);         
       if($.isNumeric(returnString) ){
        
           console.log("Troppo");
           $(inputId).val(parseInt(returnString));

       }
         
    }
    xhttp.open("GET", "shoppingcartfunction.php?action="+ action + "&id="+ idCheck + "&value="+valueRead,false);
    xhttp.send();
    totalCost();
}
function deleteProduct(id){
    
        var action = 7;
        var idDelete = id;
        var rowId = "#rowProd" + id;
    
        const xhttp = new XMLHttpRequest();
      
        xhttp.onload = function() {
            //document.getElementById("ingredientTable").innerHTML = this.responseText;            
        }
        
        xhttp.open("GET", "shoppingcartfunction.php?action="+ action + "&id="+ idDelete, false );
        xhttp.send();
    
        totalCost();
        checkCart();
        $(rowId).remove();
    
    
}
function deleteDrink(id){
    var action = 1;
    var idDelete = id;
    var rowId = "#rowDrink" + id;

    const xhttp = new XMLHttpRequest();
  
    xhttp.onload = function() {
        //document.getElementById("ingredientTable").innerHTML = this.responseText;            
    }
    
    xhttp.open("GET", "shoppingcartfunction.php?action="+ action + "&id="+ idDelete, false );
    xhttp.send();

    totalCost();
    checkCart();
    $(rowId).remove();
}
function buyProduct(){
   /* var action = 7;

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        //document.getElementById("ingredientTable").innerHTML = this.responseText;            
    }
    
    xhttp.open("GET", "shoppingcartfunction.php?action="+ action, false );
    xhttp.send();*/
}
function totalCost(){
    var action = 5;
    var totalTag = "#total";
    var total = 0;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        console.log( this.responseText);
        console.log( document.getElementById("subtotal"));
        document.getElementById("subtotal").innerHTML = this.responseText;
        total = parseFloat(this.responseText) + 2.99;
        total = total.toFixed(2);   
        document.getElementById("total").innerHTML = total;
    }
    xhttp.open("GET", "shoppingcartfunction.php?action="+ action,false );
    xhttp.send();
}