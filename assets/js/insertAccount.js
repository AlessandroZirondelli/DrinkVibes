function validateRegistrationForm(){



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
    var letters = /^[a-zA-Z]+ [a-zA-Z]+$/;
    if (letters.test($name)) {
        return true;
    }

}


//aggiunta in template
function addAccount() {
    var warningSelected = "#warningsLabel" + id;
    $(warningSelected).text("");
    $(warningSelected).fadeIn();

    var nameAcc = "";
    var UserIDAcc = "";
    var surnameAcc = "";
    var emailAcc = "";
    var passwordAcc = "";
    var typeAcc = "";
    var secondPwdAcc = "";
    var action = 3;


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

}

function fade_out(id) {
    $(id).fadeOut(1000, "linear");
}