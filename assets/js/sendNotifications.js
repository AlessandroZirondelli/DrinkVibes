$(document).ready(function(){
    //console.log("sono sendNotifications.js");
    //send();
});




function sendNotificationByChangeStateOrder(orderRef){

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    //document.getElementById("hint").innerHTML = this.responseText;         
    }
    xhttp.open("GET", "utils/sendNotifications.php?notifType="+"stateChanged"+"&orderRef="+orderRef);
    xhttp.send();

}  

function sendNotificationByNewOrder(){

}

function sendNotificationByOrderReady(){

}
