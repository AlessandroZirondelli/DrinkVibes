function uploadIngredient(id){
    var warningSelected = "#warningsLabel" + id;
    var qtnUpload = "#qtn" + id;
    var qtn = $(qtnUpload).val();
    var action = 1;
    const xhttp = new XMLHttpRequest();
 
    $(warningSelected).text("");
    $(warningSelected).fadeIn();
    if($.isNumeric(qtn) && qtn>=0){ 
        xhttp.onload = function() {
          console.log(this.responseText);
        }
        $(warningSelected).text("Saved").css("color","green");
        $(warningSelected).fadeIn();
        setTimeout(function(){fade_out(warningSelected);}, 2000);    
        console.log(action);
        console.log(id);
        console.log(qtn);
        xhttp.open("GET", "uploadIngredient.php?action="+ action + "&id=" + id + "&qtn=" + qtn);
        xhttp.send();
    }
}

function deleteIngredient(id){
    var cardDelete = "#card" +id;
    var action = 2;
    const xhttp = new XMLHttpRequest();

    $(cardDelete).remove();
    
    xhttp.onload = function() {
        console.log(this.responseText);
    }
     
    xhttp.open("GET", "uploadIngredient.php?action="+ action + "&id=" + id);
    xhttp.send();
    
}


function fade_out(id) {
    $(id).fadeOut(1000, "linear");
} 