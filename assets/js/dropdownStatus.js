$(document).ready(function(){
    /* 

    */
    switchSelectedItem(); 

});

/* */


function switchSelectedItem(){
    $("ul.dropdown-menu>li>a").click(
        function(){
            $("ul.dropdown-menu>li>a.active").removeClass("active");//prendo l'elemento che era selezionato prima e deseleziono
            $(this).addClass("active");
        }
    );
    
    //prendo il nuovo elemento appena clickato e lo seleziono
}


function insertStatus(){
//deve inserire nel DB tramite ajax il nuovo stato dell'ordine
}