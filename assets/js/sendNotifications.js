$(document).ready(function(){
    

});


function(){
    const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
        //document.getElementById("hint").innerHTML = this.responseText;
                
    }
    xhttp.open("GET", "utils/sendNotifications.php?id="+$orderID+"&state="+$state);
    xhttp.send();


}   
