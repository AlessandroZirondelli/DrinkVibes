$( document ).ready(function() {
    $( "#registrationForm" ).on("submit", validateRegistrationForm);
});


function isValidDate(selectedDate) {
    if (selectedDate.match(/^\d{4}-\d{2}-\d{2}$/) === null) {
        return false;
    }
    const date = selectedDate.split("-");
    const month = date[1];
    const day = date[2];
    if(!( (month <= 12 && month > 0) && (day > 0 && day <=31))){
        return false;
    }
    return true;
}

function isUnique(selectedUserId){
    const action = 1;
    var res = "";
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        res = this.responseText;
        
    }
    xhttp.open("GET", "utils/account/functionAccount.php?action=" + action + "&userId=" + selectedUserId,false);
    xhttp.send();
    if (res == false){
        return false;
    }else{
        return true;
    }
   
}
function changeRadioButtonTipology(tipology) {
    const radioButtonTipology = "#radioButton" + tipology;

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
    var letters = /^[a-zA-Z]/;
    if (letters.test($name)) {
        return true;
    }

}


function validateRegistrationForm(){
    var warningSelected = "#warningsLabel";
    $(warningSelected).text("");
    $(warningSelected).fadeIn();

    let nameAcc;
    let UserIDAcc = "";
    let surnameAcc = "";
    let emailAcc = "";
    let passwordAcc1 = "";
    let typeAcc = "";
    let passwordAcc2= "";
    let birthdayAcc ="";
    let action = 3;
    let errorEmpty = false;
    let errorPassWord = false;
    let errorEmail = false;
    let errorUserId = false;
    let errorBirthday = false;

    $("#name").css("border-color","black");
    $("#surname").css("border-color","black");
    $("#email").css("border-color","black");
    $("#userID").css("border-color","black");
    $("#birthday").css("border-color","black");
    $("#password1").css("border-color","black");
    $("#password2").css("border-color","black");
    


    if ($("#name").val() == "") {
        $("#name").css("border-color","red");
        errorEmpty = true;
    } 

    if ($("#surname").val() == "") {
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
    

return !( errorPassWord || errorEmpty || errorEmail || errorUserId || errorBirthday);

}



function fade_out(id) {
    $(id).fadeOut(1000, "linear");
}


