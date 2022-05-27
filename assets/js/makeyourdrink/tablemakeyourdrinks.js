$(document).ready(function() {
    $("#addShoppingCartBtn").click(function () {
        addShoppingCart();
    });
    $("#resetBtn").click(function () {
        reset(true);
    });
    $("#deleteRowBtn").click(function () {
        deleteRow();
    });
    $(".btn.btn-dark.text-uppercase.add-button").each(function(e){
        let idBtn = $(this).attr('id').replace('btn', '');
        let idProduct = (parseInt(idBtn));
        $(this).click(
            function(e) {
                submitQuantity(idProduct);
            }
        );
    });

});
function setListenerTable(){
    $("#deleteRowBtn").click(function () {
        deleteRow();
    });
    $("tbody tr td:last-child input").each(
        function(e) {
            let idBtn = $(this).attr('id').replace('cb', '');
            let idProduct = (parseInt(idBtn));
            $(this).click(
                function(e) {
                    changeCheckbox(idProduct);
                }
            );

        }
    );
}
function changeCheckbox(id){
    if($("#cb"+id).attr('checked') === "checked"){
        $("#cb"+id).removeAttr('checked');
    }else{
        $("#cb"+id).attr('checked', 'checked');
    }
}
function submitQuantity(id){
    let inputSelected = "#qtn" + id;  
    let warningSelected = "#warningsLabel" + id;
    let action = 1;

    if($.isNumeric($(inputSelected).val()) && $(inputSelected).val()>0){
        const xhttp = new XMLHttpRequest();
        
        $(warningSelected).text("");
        $(warningSelected).fadeIn();
        $(inputSelected).css("border-color","black");
        
        xhttp.onload = function() {  // Prende la quantità disponibile del prodotto
            if(this.status>206){ // code from 100 to 206 are information or error 
                document.location.href="/DrinkVibes/errors.php?errorNum="+this.status;
            } 
            let disponibility = this.responseText;
            updateQtn(disponibility,id);
        }
        xhttp.open("GET", "utils/submit.php?action=" + action + "&id=" + id );
        xhttp.send();

    }else{
        $(inputSelected).css("border-color","red")
                        .css("border-width","3px");     
    }
}
function updateQtn(disponibility,id){
    var inputSelected = "#qtn" + id;  
    var buttonSelected = "#btn" + id;
    var nameSelected = "#name" + id;
    var warningSelected = "#warningsLabel" + id;
    var action = 1;
    var quantity = $(inputSelected).val();
    //controllo che la quantità richiesta sia minore o uguale a quella disponibile
    if(parseInt(disponibility) > 0 && ($(inputSelected).val() <=  parseInt(disponibility) )){
        //prendo la tabella
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            if(this.status>206){ // code from 100 to 206 are information or error 
                document.location.href="/DrinkVibes/errors.php?errorNum="+this.status;
            } 
            document.getElementById("ingredientTable").innerHTML = this.responseText;            
            updateQuantityDescription(id);
            setListenerTable();
        }
        xhttp.open("GET", "gettable.php?action="+ action + "&qtn="+quantity+"&id="+id );
        xhttp.send();

        //se è sold out
        if(parseInt(disponibility) == parseInt(quantity)){   
            $(nameSelected).text($(nameSelected).text() +" - Sold out");
            $(buttonSelected).attr("disabled","disabled");
            $(inputSelected).attr("disabled","disabled");
        }
        $(warningSelected).text("Added ingredient to drink").css("color","green");
        $(warningSelected).fadeIn();
        setTimeout(function(){fade_out(warningSelected);}, 2000);
        $(inputSelected).val(""); 
    }else{
        $(inputSelected).css("border-color","red").css("border-width","3px");
        if($(inputSelected).val() >  parseInt(disponibility) ){ // Se la quantità richiesta è maggiore di quella disponibile errore
            $(warningSelected).text("Too many quantity required, max disponibility" + disponibility).css("color","red");
            $(warningSelected).fadeIn();
            setTimeout(function(){fade_out(warningSelected);}, 2000);       
        }
    }
}
function deleteRow() {
    let action = 2;
    let upgradeDatabase = true;
    const arrayDeleteId = [];

    $('[checked="checked"]').each(function() {
        arrayDeleteId.push($(this).val());
        $(this).parents("tr").remove();

        let id = $(this).val();
        let inputSelected = "#qtn" + id;  
        let buttonSelected = "#btn" + id;
        let nameSelected = "#name" + id;

        $(nameSelected).text($(nameSelected).text().replace(" - Sold out", ""));
        $(buttonSelected).removeAttr("disabled");
        $(inputSelected).removeAttr("disabled");
    });    
    

    if(arrayDeleteId.length!=0){    
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            if(this.status>206){ // code from 100 to 206 are information or error 
                document.location.href="/DrinkVibes/errors.php?errorNum="+this.status;
            } 
            document.getElementById("ingredientTable").innerHTML = this.responseText; 
            arrayDeleteId.forEach(id => {
                updateQuantityDescription(id);
            });           
            setListenerTable();
        }    
        xhttp.open("GET", "gettable.php?action="+ action + "&id="+ JSON.stringify(arrayDeleteId) + "&upDb=" + upgradeDatabase );
        xhttp.send();
        

    }
}

function addShoppingCart(){
    const xhttp = new XMLHttpRequest();
    let inputSelected = "#qtnShoppingCart"; 
    let textShoppingCart = "#textShoppingCart";
    let qtn = $(inputSelected).val();
    let action = 2;
    
    if($.isNumeric(qtn) && qtn>0){ // Controllo se la quantità inserita è maggiore di zero ed è un numero
        $(inputSelected).css("border-color","black");
        $(textShoppingCart).text("").css("color","green"); // Reset testo shoppingCart
        $(textShoppingCart).fadeIn();
        
        //Aggiungo al carrello
        xhttp.onload = function() {
            if(this.status>206){ // code from 100 to 206 are information or error 
                document.location.href="/DrinkVibes/errors.php?errorNum="+this.status;
            } 
            let returnString = this.responseText.replace(/(\r\n|\n|\r)/gm,"");
            if("Added to shopping cart" == returnString ){
                $(textShoppingCart).text(this.responseText).css("color","green");
                $(textShoppingCart).fadeIn();
                setTimeout(function(){fade_out(textShoppingCart)}, 2000);
                reset(false);
                $(inputSelected).val("");
            }else{
                setTimeout(function(){fade_out(textShoppingCart)}, 2000);
                $(textShoppingCart).text(this.responseText).css("color","red");
            }
        }
       
        xhttp.open("GET", "utils/submit.php?action="+ action + "&qtn="+ qtn,false);
        xhttp.send();
    }else{
        $(inputSelected).css("border-color","red")
                        .css("border-width","3px");
        $(textShoppingCart).text("Specify quantity").css("color","red");
        $(textShoppingCart).fadeIn();
        setTimeout(function(){fade_out(textShoppingCart)}, 2000);

    }
 
}
function reset(upDataBase){
    let upgradeDatabase = upDataBase;
    const xhttp = new XMLHttpRequest();
    let action = 2;
    const arrayDeleteId = [];
    
    $("#ingredientTable tbody tr").each(
        function(){
            $(this).children().last().children().children().attr('checked', 'checked');
        }
    )
       
    $('[checked="checked"]').each(function() {
        arrayDeleteId.push($(this).val());
       
        if(upgradeDatabase == true){
            let id = $(this).val();
            let inputSelected = "#qtn" + id;  
            let buttonSelected = "#btn" + id;
            let nameSelected = "#name" + id;
    
            $(nameSelected).text($(nameSelected).text().replace(" - Sold out", ""));
            $(buttonSelected).removeAttr("disabled");
            $(inputSelected).removeAttr("disabled");    
        }
        
    });    
 
    xhttp.onload = function() {
        if(this.status>206){ // code from 100 to 206 are information or error 
            document.location.href="/DrinkVibes/errors.php?errorNum="+this.status;
        } 
        document.getElementById("ingredientTable").innerHTML = this.responseText;            
        arrayDeleteId.forEach(id => {    
            updateQuantityDescription(id);
        });
        setListenerTable();
    }
    xhttp.open("GET", "gettable.php?action="+ action + "&id="+ JSON.stringify(arrayDeleteId) + "&upDb=" + upgradeDatabase,false );
    xhttp.send();
    
}
function updateQuantityDescription(id){
    let action = 1;
    let disponibility = 0;
    let idQtnDesc = "#qtnDescription" + id;

    $.post('utils/submit.php', { "action": action, "id" : id}, 
    function(returnedData){
        disponibility = returnedData;
        $(idQtnDesc).text(disponibility);
    }).fail(function(){
        document.location.href = "/DrinkVibes/errors.php?errorNum= ";
    });    
}
function fade_out(id) {
    $(id).fadeOut(1000, "linear");
} 