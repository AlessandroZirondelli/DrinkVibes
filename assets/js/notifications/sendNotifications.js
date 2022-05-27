
function sendNotificationByChangeStateOrder(orderRef){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if(this.status>206){ // code from 100 to 206 are information or error 
            document.location.href="/DrinkVibes/errors.php?errorNum="+this.status;
        } 
    }
    xhttp.open("GET", "utils/sendNotifications.php?notifType="+"stateChanged"+"&orderRef="+orderRef);
    xhttp.send(); 
}  


function sendNotificationByOrderReady(orderRef){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if(this.status>206){ // code from 100 to 206 are information or error 
            document.location.href="/DrinkVibes/errors.php?errorNum="+this.status;
        } 
    }
    xhttp.open("GET", "utils/sendNotifications.php?notifType="+"orderReady"+"&orderRef="+orderRef);
    xhttp.send();
}

function sendNotificationByNewOrder(orderRef,description){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if(this.status>206){ // code from 100 to 206 are information or error 
            document.location.href="/DrinkVibes/errors.php?errorNum="+this.status;
        } 
    }
    xhttp.open("GET", "utils/sendNotifications.php?notifType="+"newOrder"+"&orderRef="+orderRef+"&description="+description);
    xhttp.send();
}


function sendNotificartionBySoldout(articleIDRef,articleNameRef){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if(this.status>206){ // code from 100 to 206 are information or error 
            document.location.href="/DrinkVibes/errors.php?errorNum="+this.status;
        } 
    }
    xhttp.open("GET", "utils/sendNotifications.php?notifType="+"soldout"+"&articleIDRef="+articleIDRef+"&articleNameRef="+articleNameRef);
    xhttp.send();
}
