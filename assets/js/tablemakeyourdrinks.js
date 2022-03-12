function changeCheckbox(id){
    if($("#cb"+id).attr('checked') === "checked"){
        $("#cb"+id).removeAttr('checked');
    }else{
        $("#cb"+id).attr('checked', 'checked');
    }
}
function submitQuantity(id){
    var inputSelected = "#qtn" + id;  
    var buttonSelected = "#btn" + id;
    var nameSelected = "#name" + id;
    var warningSelected = "#warningsLabel" + id;
    var action = 1;

    if($.isNumeric($(inputSelected).val()) && $(inputSelected).val()>0){
        var quantity = $(inputSelected).val();
        var action = 1;
        var disponibility;
        
        const xhttp = new XMLHttpRequest();
        
        $(warningSelected).text("");
        $(warningSelected).fadeIn();
        $(inputSelected).css("border-color","black");
        
        xhttp.onload = function() {  // Prende la quantità disponibile del prodotto
            disponibility = this.responseText;
        }
        xhttp.open("GET", "submit.php?action=" + action + "&id=" + id,false );
        xhttp.send();
        
        //controllo che la quantità richiesta sia minore o uguale a quella disponibile
        if(parseInt(disponibility) > 0 && $(inputSelected).val() <=  parseInt(disponibility) ){
            
            //prendo la tabella
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("ingredientTable").innerHTML = this.responseText;            
            }
            xhttp.open("GET", "gettable.php?action="+ action + "&qtn="+quantity+"&id="+id );
            xhttp.send();
          
            //se è sold out
            if(parseInt(disponibility) == parseInt(quantity)){   
                //sendNotificartionBySoldout(id,$(nameSelected).text()); // metterlo solo quando hai comprato
                $(nameSelected).text($(nameSelected).text() +" - Sold out");
                $(buttonSelected).attr("disabled","disabled");
                $(inputSelected).attr("disabled","disabled");
            }
        }else{
            $(inputSelected).css("border-color","red").css("border-width","3px");
            if($(inputSelected).val() >  parseInt(disponibility) ){ // Se la quantità richiesta è maggiore di quella disponibile errore
                $(warningSelected).text("Too many quantity required, max disponibility" + disponibility).css("border-color","red");
                $(warningSelected).fadeIn();
                setTimeout(function(){fade_out(warningSelected);}, 2000);       
            }
        }
    }else{
        $(inputSelected).css("border-color","red")
                        .css("border-width","3px");     
    }
}
function deleteRow() {
    var action = 2;
    var upgradeDatabase = true;
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
    console.log(arrayDeleteId);
    if(arrayDeleteId.length!=0){
        console.log("enter");
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("ingredientTable").innerHTML = this.responseText;            
        }
        
        xhttp.open("GET", "gettable.php?action="+ action + "&id="+ JSON.stringify(arrayDeleteId) + "&upDb=" + upgradeDatabase );
        xhttp.send();
    }
}

function addShoppingCart(){
    const xhttp = new XMLHttpRequest();
    const xhttp1 = new XMLHttpRequest();
    var inputSelected = "#qtnShoppingCart"; 
    var textShoppingCart = "#textShoppingCart";
    var type = "handmadedrink";
    var qtn = $(inputSelected).val();
    var action = 2;

    if($.isNumeric(qtn) && qtn>0){ // Controllo se la quantità inserita è maggiore di zero ed è un numero
        $(inputSelected).css("border-color","black");
        $(textShoppingCart).text("").css("color","green"); // Reset testo shoppingCart
        $(textShoppingCart).fadeIn();
        
        //Aggiungo al carrello
        xhttp.onload = function() {
            var returnString = this.responseText.replace(/(\r\n|\n|\r)/gm,"");
            if("Added to shopping cart" == returnString ){
                //document.getElementById("textShoppingCart").innerHTML = this.responseText;
                $(textShoppingCart).text(this.responseText).css("color","green");
                $(textShoppingCart).fadeIn();
                setTimeout(function(){fade_out(textShoppingCart)}, 2000);
            }else{
                setTimeout(function(){fade_out(textShoppingCart)}, 2000);
                $(textShoppingCart).text(this.responseText).css("color","red");
            }
        }
       
        xhttp.open("GET", "submit.php?action="+ action + "&qtn="+ qtn,false);
        xhttp.send();
    }else{
        $(inputSelected).css("border-color","red")
                        .css("border-width","3px");

    }

    //Debug dati
    xhttp.onload = function() {
           document.getElementById("sessionTable").innerHTML = this.responseText;       
           
    }   
    xhttp.open("GET", "cart.php?",false);
    xhttp.send();

    reset(false);
}
function reset(upDataBase){
    var upgradeDatabase = upDataBase;
    const xhttp = new XMLHttpRequest();
    var action = 2;
    const arrayDeleteId = [];
    
    $("#ingredientTable tbody tr").each(
        function(){
            $(this).children().last().children().children().attr('checked', 'checked');
        }
    )
       
    $('[checked="checked"]').each(function() {
        arrayDeleteId.push($(this).val());
    });    

    xhttp.onload = function() {
        document.getElementById("ingredientTable").innerHTML = this.responseText;            
    }
    xhttp.open("GET", "gettable.php?action="+ action + "&id="+ JSON.stringify(arrayDeleteId) + "&upDb=" + upgradeDatabase );
    xhttp.send();
}

function fade_out(id) {
    $(id).fadeOut(1000, "linear");
} 