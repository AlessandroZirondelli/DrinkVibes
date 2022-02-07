$(document).ready(function(){
    switchSelectedItem(); 

});

/* */


function switchSelectedItem(){
    $("ul.dropdown-menu>li>a").click(
        function(){        
            $(this).parent().parent().find(".active").removeClass("active"); //prendo l'elemento che era selezionato prima e deseleziono
            $(this).addClass("active");//evidenzio l'item appena selezionato
            

            $orderID=$(this).parent().parent().attr('id').match(/\d+/);//serve per prendere solo la parte numerica dell'ID che corrisponde all'ID dell'ordine
            $state=$(this).text().replace(/\s+/g, '+');
            
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
            //document.getElementById("hint").innerHTML = this.responseText;
                
            }
            xhttp.open("GET", "utils/updateOrderState.php?id="+$orderID+"&state="+$state);
            xhttp.send();




            //controllo se il tag div con class "dropdown" contiene tabOne nell'id o tabTwo
            dropDownSelectedID= $(this).parent().parent();
            
            //$containerToDelete= $dropDownSelectedID.closest(".container").remove();
            
            selectedTab=dropDownSelectedID.attr('id');
            number=selectedTab.match(/\d+/);
            state=$(this).text();


            if($('#tab2').length!=0){ // controllo se sono amministratore
                if($(this).text()=="Delivered"){ 
                    //elimino solo il container dell'ordine seleziomato nel tab2
                    
                    containerToRemove= dropDownSelectedID.closest(".container");
                    
                    //console.log(state);
                    if(selectedTab.includes("tabTwo")){ //se ho selezionato il secondo tab
                        containerToRemove.remove();
                        dropdownToChange="tabOne".concat(number);
                        // devo aggiornare tab1
                        $("#"+dropdownToChange).find(".active").removeClass("active");
                        //devo attivare la classe a che ha text = state
                        //console.log($('#'+dropdownToChange+);
                        //$("#"+dropdownToChange+">li a:contains()")
                        $('#'+dropdownToChange+' li:contains('+state+') a').addClass("active");
                    }
                    else{//selectedTab.includes("tabOne")) //se ho selezionato il primo tab     
                        dropdownToChange="tabTwo".concat(number);  
                        $("#"+dropdownToChange).closest(".container").remove();
                        // NON devo aggiornare tab2, in quanto lo ho già rimoss
                    }
                    
                    
                }
                else{ // se lo stato non è delivered 
                    if(selectedTab.includes("tabTwo")){ //se ho selezionato il secondo tab
                        dropdownToChange="tabOne".concat(number);
                        $("#"+dropdownToChange).find(".active").removeClass("active");
                        $('#'+dropdownToChange+' li:contains('+state+') a').addClass("active");
                    }
                    else{//se ho selezionato il primo tab
                        dropdownToChange="tabTwo".concat(number);
                        $("#"+dropdownToChange).find(".active").removeClass("active");
                        $('#'+dropdownToChange+' li:contains('+state+') a').addClass("active");
                    }

                }

            }
            else{//se sono fattorino
                if($(this).text()=="Delivered"){
                   containerToRemove= dropDownSelectedID.closest(".container");
                   containerToRemove.remove(); 
                }

            }
            
                      



            //if($dropDownSelectedID.includes("tabOne")){ //ho cliccato sul dropDown della tabella 1
                //devo aggiornare il dropDownDella secondo tab
                //se è presente un tabTwo ma con lo stesso ID finale allora aggiorna la selezione active

            //}
            
            
            
        }
    );
}


function updateStateInSpecificTabs(selectedState,order,tabsNumber){
    //$(this).parent().parent().find(".active").removeClass("active"); //prendo l'elemento che era selezionato prima e deseleziono
    $(this).addClass("active");//evidenzio l'item appena selezionato
}