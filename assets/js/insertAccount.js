function validateRegistrationForm(){
    var warningSelected = "#warningsLabel";
    $(warningSelected).text("");
    $(warningSelected).fadeIn();

    var nameAcc = "";
    var UserIDAcc = "";
    var surnameAcc = "";
    var emailAcc = "";
    var passwordAcc1 = "";
    var typeAcc = "";
    var passwordAcc2= "";
    var birthdayAcc ="";
    var action = 3;
    var errorEmpty = false;
    var errorPassWord = false;
    var errorEmail = false;
    var errorUserId = false;
    var errorBirthday = false;
    $("#name").css("border-color","black");
    $("#surname").css("border-color","black");
    $("#email").css("border-color","black");
    $("#userID").css("border-color","black");
    $("#birthday").css("border-color","black");
    $("#password1").css("border-color","black");
    $("#password2").css("border-color","black");
  


    if ($("#name").val() !== "") {
        nameAcc = $("#name").val();
        
    } else {
        $("#name").css("border-color","red");
        errorEmpty = true;
    }

    if ($("#surname").val() !== "") {
        surnameAcc = $("#surname").val();
     
    } else {
        $("#surname").css("border-color","red");
        errorEmpty = true;        
    }

    if ($("#email").val() !== "") {
        emailAcc = $("#email").val();

        if (!(validateEmail(emailAcc))) {
            errorEmail = true;

            $("#email").css("border-color","red");
            $(warningSelected).text("Error! E-mail format incorrect").css("color", "red");
            $(warningSelected).fadeIn();
            setTimeout(function() { fade_out(warningSelected); }, 2000);
        }
    } else {
        $("#email").css("border-color","red");
        errorEmpty = true;
    }

    if ($("#userID").val() !== "") {
        UserIDAcc = $("#userID").val();
        if(!isUnique(UserIDAcc)){
            errorUserId = true;
            $("#userID").css("border-color","red");
            $(warningSelected).text("Error! UserId is already present").css("color", "red");
            $(warningSelected).fadeIn();
        }
    } else {
        $("#userID").css("border-color","red");
        errorEmpty = true;
    }
    
    if ($("#birthday").val() !== "") {
        birthdayAcc = $("#birthday").val();
        if(!isValidDate(birthdayAcc)){
            errorBirthday = true;
            $("#birthday").css("border-color","red");
            $(warningSelected).text("Error! Date birthday is incorrect").css("color", "red");
            $(warningSelected).fadeIn();
        }

    } else {
        $("#birthday").css("border-color","red");
        errorEmpty = true;
    }

    if ($("#password1").val() !== "") {
        passwordAcc1 = $("#password1").val();

    } else {
        $("#password1").css("border-color","red");
        errorEmpty = true;
    }

    if ($("#password2").val() !== "") {
        passwordAcc2 = $("#password2").val();

    } else {
        $("#password2").css("border-color","red");
        errorEmpty = true;
    }

    typeAcc = $("#tipology").children('[checked]').val();

    if(passwordAcc1 != passwordAcc2){
        errorPassWord = true;
        $(warningSelected).text("Errore! Password non corrispondenti").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
        $("#password1").css("border-color","red");
        $("#password2").css("border-color","red");
    }
    if(errorEmpty == true){
        $(warningSelected).text("Errore! Sono presenti alcuni campi vuoti").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
    }
    
/*

    console.log("Name: " + nameAccount);
    console.log("Surname: " + descProduct);
    console.log("Email: " + qtnProduct);
    console.log("UserID: " + priceProduct);
    console.log("Tipology: " + typeProduct);


    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {

        }
        //carica le nuove modifiche dei prodotti o ne aggiunge di nuovi a seconda del caso in cui si trova
    xhttp.open("GET", "uploadAccount.php?action=" + action + "&imageurl=" + imgProduct + "&name=" + nameProduct + "&descr=" + descProduct + "&qtn=" + qtnProduct + "&price=" + priceProduct + "&tipology=" + typeProduct);
    xhttp.send();
*/
//return !( errorPassWord || errorEmpty);
/*console.log("_____");
console.log(errorPassWord);
console.log(errorEmpty);
console.log(errorEmail);
console.log(!( errorPassWord || errorEmpty || errorEmail));
console.log("_____");*/

return !( errorPassWord || errorEmpty || errorEmail || errorUserId || errorBirthday);

}

function isValidDate(dateString) {
   

    if (dateString.match(/^\d{4}-\d{2}-\d{2}$/) === null) {
        return false;
    }
    var date = dateString.split("-");
    var month = date[1];
    var day = date[2];
    if(!( (month <= 12 && month > 0) && (day > 0 && day <=31))){
        return false;
    }
    return true;
    /*
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    if(!dateString.match(regEx)) return false;  // Invalid formatvar d = new Date(dateString);
    var dNum = d.getTime();
    if(!dNum && dNum !== 0) return false; // NaN value, Invalid date
    return d.toISOString().slice(0,10) === dateString;*/
}
function isUnique(userId){
    var action = 1;
    var res = "";
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        res = this.responseText;
        
    }
    //carica le nuove modifiche dei prodotti o ne aggiunge di nuovi a seconda del caso in cui si trova
    xhttp.open("GET", "utils/functionAccount.php?action=" + action + "&userId=" + userId,false);
    xhttp.send();
    if (res == false){
        return false;
    }else{
        return true;
    }
   
}
function changeRadioButtonTipology(tipology) {
    var radioButtonTipology = "#radioButton" + tipology;

    $("#tipology input").each(function() {
        $(this).removeAttr('checked');
    });
    $(radioButtonTipology).attr('checked', 'checked');
}

function validateEmail($email) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($email)) {
        return true;
    }

}

function validateLetters($name) {
    //var letters = /^[a-zA-Z]+ [a-zA-Z]+$/;
    var letters = /^[a-zA-Z]/;
    if (letters.test($name)) {
        return true;
    }

}


//aggiunta in template
function addAccount() {
    var warningSelected = "#warningsLabel";
    $(warningSelected).text("fadjfapoi");
    $(warningSelected).fadeIn();

    var nameAcc = "";
    var UserIDAcc = "";
    var surnameAcc = "";
    var emailAcc = "";
    var passwordAcc = "";
    var typeAcc = "";
    var secondPwdAcc = "";
    var action = 3;

    
/*
    if ($("#name").val() !== "") {
        nameAcc = $("#name").val();
        if (!(validateLetters(nameAcc))) {
            $(warningSelected).text("Errore! Formato nome non corretto").css("color", "red");
            $(warningSelected).fadeIn();
            setTimeout(function() { fade_out(warningSelected); }, 2000);
        }
    } else {
        $(warningSelected).text("Errore! Sono presenti alcuni campi vuoti").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
    }

    if ($("#surname").val() !== "") {
        surnameAcc = $("#surname").val();
        if (!(validateLetters(surnameAcc))) {
            $(warningSelected).text("Errore! Formato cognome non corretto").css("color", "red");
            $(warningSelected).fadeIn();
            setTimeout(function() { fade_out(warningSelected); }, 2000);
        }
    } else {
        $(warningSelected).text("Errore! Sono presenti alcuni campi vuoti").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
    }

    if ($("#email").val() !== "") {
        emailAcc = $("#email").val();

        if (!(validateEmail(emailAcc))) {
            $(warningSelected).text("Errore! Formato email non corretto").css("color", "red");
            $(warningSelected).fadeIn();
            setTimeout(function() { fade_out(warningSelected); }, 2000);
        }
    } else {
        $(warningSelected).text("Errore! Sono presenti alcuni campi vuoti").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
    }

    if ($("#userID").val() !== "") {
        UserIDAcc = $("#userID").val();

    } else {
        $(warningSelected).text("Errore! Sono presenti alcuni campi vuoti").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
    }

    if ($("#password").val() !== "") {
        passwordAcc = $("#password").val();

    } else {
        $(warningSelected).text("Errore! Sono presenti alcuni campi vuoti").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
    }

    if ($("#pwd").val() !== "") {
        secondPwdAcc = $("#pwd").val();

    } else {
        $(warningSelected).text("Errore! Sono presenti alcuni campi vuoti").css("color", "red");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
    }

    typeAcc = $("#tipology").children('[checked]').val();



    console.log("Name: " + nameAccount);
    console.log("Surname: " + descProduct);
    console.log("Email: " + qtnProduct);
    console.log("UserID: " + priceProduct);
    console.log("Tipology: " + typeProduct);


    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {

        }
        //carica le nuove modifiche dei prodotti o ne aggiunge di nuovi a seconda del caso in cui si trova
    xhttp.open("GET", "uploadAccount.php?action=" + action + "&imageurl=" + imgProduct + "&name=" + nameProduct + "&descr=" + descProduct + "&qtn=" + qtnProduct + "&price=" + priceProduct + "&tipology=" + typeProduct);
    xhttp.send();
*/
}

function fade_out(id) {
    $(id).fadeOut(1000, "linear");
}