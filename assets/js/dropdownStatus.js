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
                         //se non trova nulla
                            if(($("#"+dropdownToChange).find(".active")).length){ // se l'elemento c'è già in tab2
                                //console.log("NON vuoto");
                                $("#"+dropdownToChange).find(".active").removeClass("active");
                                $('#'+dropdownToChange+' li:contains('+state+') a').addClass("active");
                            }
                            else{ //se l'elemento non c'era già in tab 2 , devo creare un nuovo Order
                                /* Devo copiare queste cose dall'ordine del tab1:
                                    -stato 
                                    -order number
                                
                                
                                */
                                /* 
                                <div class="container">
                                        <div class="row"> <!--  INIZZIA LA ROW-->
                                            <div class="col-4 col-md-4 p-0">
                                                <div>
                                                    Ordered on: 
                                                </div>
                                                <div>
                                                    2021-12-07                                                </div>
                                            </div>
                                            <div class="col-5 col-md-4 p-0">
                                                <div>
                                                     Order number: 
                                                </div>
                                                <div>
                                                    3                                                </div>
                                            </div>
                                
                                            <!-- qui devo fare il controllo del type user. Se amin o fattorino faccio uscire drop down -->
                                            
                                                                                            <div class="col-3 col-md-4 p-0">
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownStatus" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Status <!-- Questo si aggiornerà in base al valore selezionato ed attuale dello stato -->
                                                        </button>
                                                        <ul class="dropdown-menu" id="tabOne3" aria-labelledby="dropdownStatus">
                                                             <li><a class="dropdown-item " href="#">To prepare</a></li>                                                             <!-- Il fattorino ha solo 3 opzioni. NON ha "To prepare"-->
                                                            <li><a class="dropdown-item " href="#">Ready to delivery</a></li> <!--Per disabilitarlo aggiungere disabled come classe al tag <a> -->
                                                            <li><a class="dropdown-item " href="#">Shipped</a></li>
                                                            <li><a class="dropdown-item active" href="#">Delivered</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                               

                                        </div> <!-- CHIUDE LA ROW -->
                            
                                        <div class="accordion accordion-flush" id="accordionFlush3">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-heading3">
                                                    <button class="accordion-button collapsed px-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                                                        More info
                                                    </button>
                                                </h2>
                                    
                                                <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3" data-bs-parent="#accordionFlush3">
                                                    <div class="accordion-body p-0">
                                                                                                                <div>
                                                            Total: 6665 $
                                                        </div>
                                                                                                                    <div>
                                                                7 Fanta 715 $    
                                                            </div>
                                                                                                            </div>
                                                </div>
                                            </div>
                                        </div>  <!-- FINE DELL'ACCORDION -->   
                            
                                    </div> <!-- FINE DEL CONTAINER -->                                
                                */


                            }
                    }

                }

            }
            else{//se sono fattorino
                if($(this).text()=="Delivered"){
                   containerToRemove= dropDownSelectedID.closest(".container");
                   containerToRemove.remove(); 
                }

            }            
            
        }
    );
}
