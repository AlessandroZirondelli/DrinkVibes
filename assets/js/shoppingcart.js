$(document).ready(function() {
    totalCost();
    checkCart();

    //delete product
    $("td.align-middle.deletebtnProduct :nth-child(1)").click(
        function(e) {
            let idBtnP = $(this).attr('id');
            let idProduct = (parseInt(idBtnP));
            deleteProduct(idProduct);

        }
    )

    //delete drink
    $("td.align-middle.deletebtnDrink :nth-child(1)").click(
        function(e) {

            let idBtnD = $(this).attr('id');
            let idDrink = (parseInt(idBtnD));
            deleteDrink(idDrink);


        }
    )
    
    for (const elem of document.querySelectorAll('.d-flex.flex-row.selector')) {
        elem.querySelector('.btn.btn-link.px-2.down').click(
            function() {
                const numberInput = elem.querySelector('input[type=number]')
                if (numberInput.value > 0)
                    numberInput.stepDown();
            }
        )

        elem.querySelector('.btn.btn-link.px-2.up').click(
            function() {
                const numberInput = elem.querySelector('input[type=number]')
                if (numberInput.value > 0)
                    numberInput.stepUp();
            }
        )
    }
    /*$(".form-control.form-control-sm.change-btn").each(function(e){
        let idBtn = $(this).attr('id').replace('formDrink', '');
        let value = $(this).attr('value');
        let idBtnChange = (parseInt(idBtn));
        $(this).change(function(){
            check_qty(value,idBtnChange);
        });
    });*/
  
});

function checkCart() {
    let action = 6;

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if (this.responseText == 0) {
            $("#cardempty").show();
            $("#paycard").hide();
            $("#tableproduct").hide();
        } else {
            $("#paycard").show();
            $("#cardempty").hide();
            $("#paycard").show();
        }
    }

    xhttp.open("GET", "shoppingcartfunction.php?action=" + action);
    xhttp.send();
}

function check_qty_prod(value, id) {
    let valueRead = value;
    let idCheck = id;
    let action = 8;
    let inputId = "#formProd" + id;


    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        
        let returnString = this.responseText.replace(/(\r\n|\n|\r)/gm, "");
        if ($.isNumeric(returnString)) {
            $(inputId).val(parseInt(returnString));
        }
        totalCost();
    }
    xhttp.open("GET", "shoppingcartfunction.php?action=" + action + "&id=" + idCheck + "&value=" + valueRead);
    xhttp.send();
    
}

function check_qty(value, id) {
    let valueRead = value;
    let idCheck = id;
    let action = 2;
    let inputId = "#formDrink" + id;
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        let returnString = this.responseText.replace(/(\r\n|\n|\r)/gm, "");
        if ($.isNumeric(returnString)) {
            $(inputId).val(parseInt(returnString));
        }
        totalCost();
    }
    xhttp.open("GET", "shoppingcartfunction.php?action=" + action + "&id=" + idCheck + "&value=" + valueRead);
    xhttp.send();

}

function deleteProduct(id) {

    let action = 7;
    let idDelete = id;
    let rowId = "#rowProd" + id;
    const xhttp = new XMLHttpRequest();
    /*
        xhttp.onload = function() {
            //document.getElementById("ingredientTable").innerHTML = this.responseText;            
        }
        
        xhttp.open("GET", "shoppingcartfunction.php?action="+ action + "&id="+ idDelete, false );
        xhttp.send();
    */



    $.post('shoppingcartfunction.php', { "action": action, "id": id },
        function(returnedData) {
            console.log(returnedData);
            totalCost();
            checkCart();
            $(rowId).remove();
        }).fail(function() {
        console.log("error");
    });

    

}

function deleteDrink(id) {
    let action = 1;
    let idDelete = id;
    let rowId = "#rowDrink" + id;

    const xhttp = new XMLHttpRequest();

    /*
    xhttp.onload = function() {
        //document.getElementById("ingredientTable").innerHTML = this.responseText;            
    }

    xhttp.open("GET", "shoppingcartfunction.php?action=" + action + "&id=" + idDelete, false);
    xhttp.send();
*/

    $.post('shoppingcartfunction.php', { "action": action, "id": id },
        function(returnedData) {
            //console.log(returnedData);
            totalCost();
            checkCart();
            $(rowId).remove();
        }).fail(function() {
        console.log("error");
    });

    
}
/*
function buyProduct(){
    var action = 9;

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
       console.log(this.response);         
    }
    sendNotificationByNewOrder("1000","rum cubralibre");
    sendNotificartionBySoldout("500","vokdaaciao");
    xhttp.open("GET", "shoppingcartfunction.php?action="+ action, false );
    xhttp.send();
}*/
function totalCost() {
    let action = 5;
    let totalTag = "#total";
    let total = 0;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        console.log(this.responseText);
        console.log(document.getElementById("subtotal"));
        document.getElementById("subtotal").innerHTML = this.responseText;
        total = parseFloat(this.responseText) + 2.99;
        total = total.toFixed(2);
        document.getElementById("total").innerHTML = total;
    }
    xhttp.open("GET", "shoppingcartfunction.php?action=" + action);
    xhttp.send();
}