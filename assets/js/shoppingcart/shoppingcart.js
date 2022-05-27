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
    
    $("input.change-btn.first").each(function(e){
        let idBtn = $(this).attr('id').replace('formDrink', '');
        let idBtnChange = (parseInt(idBtn));
        $(this).change(function(){
            let value = $(this).val();
            check_qty(value,idBtnChange);
        });
        
    });

    $("input.change-btn.second").each(function(e){
        let idBtn = $(this).attr('id').replace('formProd', '');
        let idBtnChange = (parseInt(idBtn));
        $(this).change(function(){
            let value = $(this).val(); 
            check_qty_prod(value,idBtnChange);
        });
    });  
    
});


function checkCart() {
    let action = 6;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if (this.status > 206) { // code from 100 to 206 are information or error 
            document.location.href = "/DrinkVibes/errors.php?errorNum=" + this.status;
        }
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

    xhttp.open("GET", "utils/shoppingcartfunction.php?action=" + action);
    xhttp.send();
}

function check_qty_prod(value, id) {
    let valueRead = value;
    let idCheck = id;
    let action = 8;
    let inputId = "#formProd" + id;
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        if (this.status > 206) { // code from 100 to 206 are information or error 
            document.location.href = "/DrinkVibes/errors.php?errorNum=" + this.status;
        }
        let returnString = this.responseText.replace(/(\r\n|\n|\r)/gm, "");
        if ($.isNumeric(returnString)) {
            $(inputId).val(parseInt(returnString));
        }
       
        totalCost();
    }
    xhttp.open("GET", "utils/shoppingcartfunction.php?action=" + action + "&id=" + idCheck + "&value=" + valueRead);
    xhttp.send();
    
}

function check_qty(value, id) {
    let valueRead = value;
    let idCheck = id;
    let action = 2;
    let inputId = "#formDrink" + id;
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        if (this.status > 206) { // code from 100 to 206 are information or error 
            document.location.href = "/DrinkVibes/errors.php?errorNum=" + this.status;
        }
        let returnString = this.responseText.replace(/(\r\n|\n|\r)/gm, "");
        if ($.isNumeric(returnString)) {
            $(inputId).val(parseInt(returnString));
        }
        
        totalCost();
    }
    xhttp.open("GET", "utils/shoppingcartfunction.php?action=" + action + "&id=" + idCheck + "&value=" + valueRead);
    xhttp.send();

}

function deleteProduct(id) {
    let action = 7;
    let rowId = "#rowProd" + id;
    
    $.post('utils/shoppingcartfunction.php', { "action": action, "id": id },
        function(returnedData) {
            totalCost();
            checkCart();
            $(rowId).remove();
           
        }).fail(function() {
            document.location.href = "/DrinkVibes/errors.php?errorNum= ";
    });

}

function deleteDrink(id) {
    let action = 1;
    let rowId = "#rowDrink" + id;

    $.post('utils/shoppingcartfunction.php', { "action": action, "id": id },
        function(returnedData) {
            totalCost();
            checkCart();
            $(rowId).remove();
           
        }).fail(function() {
            document.location.href = "/DrinkVibes/errors.php?errorNum= ";
    });
}

function totalCost() {
    let action = 5;
    let total = 0;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if(this.status>206){ // code from 100 to 206 are information or error 
            document.location.href="/DrinkVibes/errors.php?errorNum="+this.status;
        } 
        document.getElementById("subtotal").innerHTML = this.responseText;
        total = parseFloat(this.responseText) + 2.99;
        total = total.toFixed(2);
        document.getElementById("total").innerHTML = total;
    }
    xhttp.open("GET", "utils/shoppingcartfunction.php?action=" + action);
    xhttp.send();
}