$( document ).ready(function() {
    totalCost();
});
function check_qty(value,id){
    var valueRead = value;
    var idCheck = id;
    var action = 2;
    var inputId = "#form" + id;
    
   
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
function deleteDrink(id){
    var action = 1;
    var idDelete = id;
    var rowId = "#row" + id;

    const xhttp = new XMLHttpRequest();
  
    xhttp.onload = function() {
        //document.getElementById("ingredientTable").innerHTML = this.responseText;            
    }
    
    xhttp.open("GET", "shoppingcartfunction.php?action="+ action + "&id="+ idDelete, false );
    xhttp.send();

    totalCost();

    $(rowId).remove();
}
function buyProduct(){
    var action = 6;

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        //document.getElementById("ingredientTable").innerHTML = this.responseText;            
    }
    
    xhttp.open("GET", "shoppingcartfunction.php?action="+ action, false );
    xhttp.send();
}
function totalCost(){
    var action = 5;
    var totalTag = "#total";
    var total = 0;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("subtotal").innerHTML = this.responseText;
        total = parseFloat(this.responseText) + 2.99;
        total = total.toFixed(2);   
        document.getElementById("total").innerHTML = total;
    }
    xhttp.open("GET", "shoppingcartfunction.php?action="+ action,false );
    xhttp.send();
}