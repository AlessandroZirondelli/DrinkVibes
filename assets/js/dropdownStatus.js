$(document).ready(function(){
    switchSelectedItem(); 

});

/* */


function switchSelectedItem(){
    $("ul.dropdown-menu>li>a").click(
        function(){        
            $(this).parent().parent().find(".active").removeClass("active"); //prendo l'elemento che era selezionato prima e deseleziono
            $(this).addClass("active");//evidenzio l'item appena selezionato
            $orderID=$(this).parent().parent().attr('id');
            $state=$(this).text().replace(/\s+/g, '+');
            
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
            //document.getElementById("hint").innerHTML = this.responseText;
                
            }
            xhttp.open("GET", "utils/updateOrderState.php?id="+$orderID+"&state="+$state);
            xhttp.send();
            
        }
    );
}