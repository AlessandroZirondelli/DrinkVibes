$(document).ready(function () {
    $("div.selection-option :nth-child(1)") //select button add in all cards
        .each(
            function (index) {
                const idBtn = $(this).attr('id').replace('btn', '');
                const idProduct = (parseInt(idBtn));
                $(this).click(
                    function (e) {
                        submitQuantity(idProduct);
                    }
                );
            }
        );
        
        upgradeDBProd();
       //console.log(getCookie("product") == "");
       
});
function upgradeDBProd(){
    let action = 9;
    let sp =  getCookie("product");

    if(sp != ""){
        
        $.post('shoppingcartfunction.php', { "action": action, "sp": sp },
        function(returnedData) {
            console.log(returnedData);
            
        }).fail(function() {
            document.location.href = "/DrinkVibes/errors.php?errorNum= ";
        });
    }else{
        console.log("Not execute");
    }

}
function setCookie(cname,cvalue,exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    const getCookieValue = decodeURIComponent(document.cookie.match('(^|;)\\s*' + cname + '\\s*=\\s*([^;]+)')?.pop() || '');
    return getCookieValue;
}
function upgradeCookieProd(){
    let action = 10;
    $.post('shoppingcartfunction.php', { "action": action },
    function(returnedData) {
        let returnString = returnedData.replace(/(\r\n|\n|\r)/gm, "");
        let returna  =  encodeURIComponent(returnString);
        setCookie('product',"" + returna,30);
    }).fail(function() {
        document.location.href = "/DrinkVibes/errors.php?errorNum= ";
    });
}

function submitQuantity(id) {
    const inputSelected = "#qtn" + id;
    const warningSelected = "#warningsLabel" + id;

    if ($.isNumeric($(inputSelected).val()) && $(inputSelected).val() > 0) {
        const action = 3;
        let disponibility;

        $(warningSelected).text("");
        $(warningSelected).fadeIn();
        $(inputSelected).css("border-color", "black");

        $.post('utils/submit.php', { "action": action, "id": id },
            function (returnedData) {
                disponibility = returnedData;
                updateQtn(disponibility, id);
            }).fail(function (xhr, status, error) {
                document.location.href = "/DrinkVibes/errors.php?errorNum= ";
            });
    } else {
        //not numeric or less or uqual to 0
        $(inputSelected).css("border-color", "red")
            .css("border-width", "3px");
    }
}

function updateQtn(disponibility, id) {
    const action = 1;
    const inputSelected = "#qtn" + id;
    const buttonSelected = "#btn" + id;
    const nameSelected = "#name" + id;
    const warningSelected = "#warningsLabel" + id;
    let quantity = $(inputSelected).val();

    if (parseInt(disponibility) > 0 && $(inputSelected).val() <= parseInt(disponibility)) {
        
        $.post('utils/updateProduct.php', { "action": action, "id" : id, "qtn" : quantity}, 
        function(returnedData){
           updateQtnDescription(id);
           upgradeCookieProd();
        }).fail(function(xhr, status, error){
            document.location.href = "/DrinkVibes/errors.php?errorNum= ";
        });

      

        //if it's sold out
        if (parseInt(disponibility) == parseInt(quantity)) {
            $(nameSelected).text($(nameSelected).text() + " [Sold out]");
            $(buttonSelected).attr("disabled", "disabled");
            $(inputSelected).attr("disabled", "disabled");
        }
        $(warningSelected).text("Added to cart shopping").css("color", "green");
        $(warningSelected).fadeIn();
        setTimeout(function() { fade_out(warningSelected); }, 2000);
        $(inputSelected).val(""); 
       

    } else {

        $(inputSelected).css("border-color", "red").css("border-width", "3px");
        if ($(inputSelected).val() > parseInt(disponibility)) { // if require more quantity than availabilty
            $(warningSelected).text("Too many quantity required, max disponibility" + disponibility).css("color", "red");
            $(warningSelected).fadeIn();
            setTimeout(function () { fade_out(warningSelected); }, 2000);
        }
    }
}
function updateQtnDescription(id) {
    let idQuantityDescription = "#quantityDescription" + id;
    let disponibility = 0;
    let action = 3;

    $.post('utils/submit.php', { "action": action, "id": id },
        function (returnedData) {
            disponibility = returnedData;
            $(idQuantityDescription).text(disponibility);
        }).fail(function () {
            document.location.href = "/DrinkVibes/errors.php?errorNum= ";
        });
}
function fade_out(id) {
    $(id).fadeOut(1000, "linear");
} 