/*$(document).ready(function(){
    //console.log("sono sendNotifications.js");
    //send();
});
*/


//questa fuzione verrà chiamata all'interno del dropdownstatus.js oppure di un altro
function sendNotificationByChangeStateOrder(orderRef){

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    //document.getElementById("hint").innerHTML = this.responseText;         
    }
    xhttp.open("GET", "utils/sendNotifications.php?notifType="+"stateChanged"+"&orderRef="+orderRef);
    xhttp.send();

}  

function hello(){
    console.log("hello");
}

function sendNotificationByNewOrder(){

}

function sendNotificationByOrderReady(){

}
