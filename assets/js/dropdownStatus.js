$(document).ready(function(){
    switchSelectedItem(); 

});

/* */


function switchSelectedItem(){
    $("ul.dropdown-menu>li>a").click(     
        function(e){  
            //console.log("click");   
            e.preventDefault();//serve per evitare che la pagina mi torni su quando cambio gli stati, quindi quando clicco sui link
            $(this).parent().parent().find(".active").removeClass("active"); //prendo l'elemento che era selezionato prima e deseleziono
            $(this).addClass("active");//evidenzio l'item appena selezionato
            //localion.reload();
            
            $orderID=$(this).parent().parent().attr('id').match(/\d+/);//serve per prendere solo la parte numerica dell'ID che corrisponde all'ID dell'ordine
            $state=$(this).text().replace(/\s+/g, '+');
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
            //document.getElementById("hint").innerHTML = this.responseText;
            //console.log("sto cambiando stato");    
            }
            xhttp.open("GET", "utils/updateOrderState.php?id="+$orderID+"&state="+$state, false);
            xhttp.send();
            
            //controllo se il tag div con class "dropdown" contiene tabOne nell'id o tabTwo
            dropDownSelectedID= $(this).parent().parent();
            
            //$containerToDelete= $dropDownSelectedID.closest(".container").remove();
            
            selectedTab=dropDownSelectedID.attr('id');
            number=selectedTab.match(/\d+/); //numero dell'ordine
            state=$(this).text();

            console.log("state:"+state);
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
                    sendNotificationByChangeStateOrder($orderID);  
                }
                else{ // se lo stato non è delivered 
                    if(selectedTab.includes("tabTwo")){ //se ho selezionato il secondo tab
                        dropdownToChange="tabOne".concat(number);
                        $("#"+dropdownToChange).find(".active").removeClass("active");
                        $('#'+dropdownToChange+' li:contains('+state+') a').addClass("active");
                        sendNotificationByChangeStateOrder($orderID);
                        if(state=="Ready to delivery"){sendNotificationByOrderReady(number);}
                    }
                    else{//se ho selezionato il primo tab
                        dropdownToChange="tabTwo".concat(number);
                         //se non trova nulla
                            if(($("#"+dropdownToChange).find(".active")).length){ // se l'elemento c'è già in tab2
                                //console.log("NON vuoto");
                                $("#"+dropdownToChange).find(".active").removeClass("active");
                                $('#'+dropdownToChange+' li:contains('+state+') a').addClass("active");
                                sendNotificationByChangeStateOrder($orderID);
                                if(state=="Ready to delivery"){sendNotificationByOrderReady(number);}
                            }
                            else{ 
                                sendNotificationByChangeStateOrder($orderID);
                                if(state=="Ready to delivery"){sendNotificationByOrderReady(number);}
                                location.reload();
                                //se l'elemento non c'era già in tab 2 , devo creare un nuovo Order
                                /* Devo copiare queste cose dall'ordine del tab1:
                                    -stato 
                                    -order number
                                    - id="dropdownStatusTabOne2" id del button dropdown-toggle
                                    - aria-labelledby="dropdownStatusTabOne2"
                                */
                               /*
                                    lastContainer=$("#tab2 .container:last"); //dopo questo container devo aggiungerge un altro
                                    
                                    idDropdownToggle="dropdownStatusTabTwo".concat(number);
                                    arialabelled=idDropdownToggle;
                                    
                                    //devo cercare nel tab 1 quale container ha un 
                                    selectedContainerTabOne= dropDownSelectedID.closest(".container");
                                    code = '<div class="container">'+selectedContainerTabOne.html()+'</div>';
                                    lastContainer.after(code);
                                    //dopo aver aggiuinto questo container, devo modificare :
                                    //dropdownStatusTabOne1 in dropdownStatusTabTwo1

                                    lastContainer=$("#tab2 .container:last"); // aggiorno il last container con il nuovo container da cambiare
                                    //$("#dropdownStatusTabOne"+number).prop("id","dropdownStatusTabTwo"+number);
                                    
                                    $("#tab2 .container:last .dropdown-toggle").prop("id","dropdownStatusTabTwo"+number);//button#dropDownStatus
                                    $("#tab2 .container:last .dropdown ul").attr("aria-labelledby","dropdownStatusTabTwo"+number);
                                    $("#tab2 .container:last .dropdown ul").attr("id","tabTwo"+number);

                                    $("#tab2 .container:last .accordion-flush").attr("id","accordionFlushTabTwo"+number);
                                    $("#tab2 .container:last .accordion-flush div.accordion-collapse").attr("data-bs-parent","#accordionFlushTabTwo"+number);

                                    $("#tab2 .container:last .accordion-flush div.accordion-collapse").attr("aria-labelledby","flush-headingTabTwo"+number);
                                    $("#tab2 .container:last .accordion-flush h2.accordion-header").attr("id","flush-headingTabTwo"+number);
                                
                                    $("#tab2 .container:last .accordion-flush h2.accordion-header button").attr("data-bs-target","#flush-collapseTabTwo"+number);
                                    $("#tab2 .container:last .accordion-flush h2.accordion-header button").attr("aria-controls","flush-collapseTabTwo"+number);
                                    $("#tab2 .container:last .accordion-flush div.accordion-collapse").attr("id","flush-collapseTabTwo"+number);
                                   */
                                }
                    }

                }

            }
            else{//se sono fattorino
                if($(this).text()=="Delivered"){
                   containerToRemove= dropDownSelectedID.closest(".container");
                   containerToRemove.remove(); 
                   if ( $("#tab1").children().length == 0 ) { //controllo se ho appena tolto l'ultimo ordine
                    $("#tab1").html(' \
                        <p class="text-center">No orders! </p>\
                        <p class="text-center">You\'ve delivered all orders, no orders to process.  </p>\
                    ');
                    
                   }
                }
                sendNotificationByChangeStateOrder($orderID);
            }   
            
            

            // ora posso gestire le notifiche
            //sendNotificationByChangeStateOrder($orderID);
            
        }
    );
}

