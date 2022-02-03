$(document).ready(function(){
    /* 

    */
    switchSelectedItem(); 

});

/* */


function switchSelectedItem(){
    $("ul.dropdown-menu>li>a").click(
        function(){
            //$("ul.dropdown-menu>li>a.active").removeClass("active");//prendo l'elemento che era selezionato prima e deseleziono
            //Quello sopra è sbagliato perchè vado a deselezionare anche lo stato di un altro ordine
            
            
            $(this).parent().parent().find(".active").removeClass("active");
            $(this).addClass("active");
        }
    );
    //prendo il nuovo elemento appena clickato e lo seleziono
}

function enableOnlyDeliveryButton(){

}
function insertStatus(){
//deve inserire nel DB tramite ajax il nuovo stato dell'ordine
}