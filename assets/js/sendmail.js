function sendEmail(recipient,subject,body) {
    Email.send({
        Host: "smtp.gmail.com",
        Username : "baggianisrl@gmail.com",
        Password : "PUrqHt!f6a",
        To : ''+recipient,
        From : "baggianisrl@gmail.com",
        Subject : ""+subject,
        Body : ""+body,
    })
    .then(function(message){
        alert("mail sent successfully")
    });
}