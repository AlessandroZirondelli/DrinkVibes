$(document).ready(function(){
    /* 

    */
    switchSelectedItem(); 
    //disableSpecificItem();

});

/* */


function switchSelectedItem(){
    $("ul.dropdown-menu>li>a").click(
        function(){        
            $(this).parent().parent().find(".active").removeClass("active"); //prendo l'elemento che era selezionato prima e deseleziono
            $(this).addClass("active"); //evidenzio l'item appena selezionato
            //solo se utente fattorino disabilita(Lo gestsisco dal PHP, non facendo proprio mostrare  le opzioni)
            //$(this).parent().parent().children().eq(0).children().addClass("disabled");
            
        }
    );
}