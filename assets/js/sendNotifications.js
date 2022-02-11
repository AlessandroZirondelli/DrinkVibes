/*$(document).ready(function(){
    //console.log("sono sendNotifications.js");
    //send();
});
*/


//questa fuzione verrà chiamata all'interno del dropdownstatus.js
function sendNotificationByChangeStateOrder(orderRef){

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    //document.getElementById("hint").innerHTML = this.responseText;         
    console.log("sto mandando notifica")
    }
    xhttp.open("GET", "utils/sendNotifications.php?notifType="+"stateChanged"+"&orderRef="+orderRef,false);
    xhttp.send();
   
}  


function sendNotificationByOrderReady(orderRef){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
    //document.getElementById("hint").innerHTML = this.responseText;         
    console.log("sto mandando notifica ordine pronto")
    }
    xhttp.open("GET", "utils/sendNotifications.php?notifType="+"orderReady"+"&orderRef="+orderRef,false);
    xhttp.send();
   
}

function sendNotificationByNewOrder(){
    

}
