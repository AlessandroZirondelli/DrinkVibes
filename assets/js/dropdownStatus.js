$(document).ready(function(){
    switchSelectedItem(); 

});

function switchSelectedItem(){
    $("ul.dropdown-menu>li>a").click(     
        function(e){     
            e.preventDefault();//It use to avoid page up scrolling when someone change state
            $(this).parent().parent().find(".active").removeClass("active"); //Select element that it selected before to deselect.
            $(this).addClass("active");//Mark and select new element just cliccked
            //localion.reload();
            
            $orderID=$(this).parent().parent().attr('id').match(/\d+/);//serve per prendere solo la parte numerica dell'ID che corrisponde all'ID dell'ordine
            $state=$(this).text().replace(/\s+/g, '+');
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                //no code to do when server generate response
                //here you must be insert what it must be done when server reply
            }
            xhttp.open("GET", "utils/updateOrderState.php?id="+$orderID+"&state="+$state, false);
            xhttp.send();
            
            // Check if dropdown belong to tab1 or tab2
            dropDownSelectedID= $(this).parent().parent();
            
            //$containerToDelete= $dropDownSelectedID.closest(".container").remove();
            
            selectedTab=dropDownSelectedID.attr('id');
            number=selectedTab.match(/\d+/); //Order number. Match is used to remove every caracter
            state=$(this).text(); //State of order

            //console.log("state:"+state);
            if($('#tab2').length!=0){ // Check if logged user is Admin
                if($(this).text()=="Delivered"){ 
                    //Delete only container that contains selected order
                    containerToRemove= dropDownSelectedID.closest(".container");
                    
                    //console.log(state);
                    if(selectedTab.includes("tabTwo")){ //f user has select tab2
                        containerToRemove.remove();
                        dropdownToChange="tabOne".concat(number);
                        // Tab1 must be update
                        $("#"+dropdownToChange).find(".active").removeClass("active");
                        // Selected state must be activate
                        $('#'+dropdownToChange+' li:contains('+state+') a').addClass("active");
                    }
                    else{//selectedTab.includes("tabOne")) //If user select tab1     
                        dropdownToChange="tabTwo".concat(number);  
                        $("#"+dropdownToChange).closest(".container").remove();
                        // Tab2 must't be update because it has already removed
                    }
                    sendNotificationByChangeStateOrder($orderID);  
                }
                else{ // If state isn't delivered
                    if(selectedTab.includes("tabTwo")){ //If is select tab2
                        dropdownToChange="tabOne".concat(number);
                        $("#"+dropdownToChange).find(".active").removeClass("active");
                        $('#'+dropdownToChange+' li:contains('+state+') a').addClass("active");
                        sendNotificationByChangeStateOrder($orderID);
                        if(state=="Ready to delivery"){sendNotificationByOrderReady(number);}
                    }
                    else{//If is select tab1
                        dropdownToChange="tabTwo".concat(number);
                         //If nothing has found
                            if(($("#"+dropdownToChange).find(".active")).length){ // If element is already present in tab2
                                $("#"+dropdownToChange).find(".active").removeClass("active");
                                $('#'+dropdownToChange+' li:contains('+state+') a').addClass("active");
                                sendNotificationByChangeStateOrder($orderID);
                                if(state=="Ready to delivery"){sendNotificationByOrderReady(number);}
                            }
                            else{ //If element isn't present in tab2 --> location.reload()
                                sendNotificationByChangeStateOrder($orderID);
                                if(state=="Ready to delivery"){sendNotificationByOrderReady(number);}
                                location.reload(); //refresh page
                            }
                    }

                }
                if ( $("#tab2").children().length == 0 ){ //if tab2 is empty 
                    $("#tab2").html(' \
                    <p class="text-center lead mt-5">No orders! </p>\
                    <p class="text-center lead">All orders has already delivered! </p>\
                    ');
                }

            }
            else{//if logged user is Express
                if($(this).text()=="Delivered"){
                   containerToRemove= dropDownSelectedID.closest(".container");
                   containerToRemove.remove(); 
                   if ( $("#tab1").children().length == 0 ) { //check if user has just delte last order
                    $("#tab1").html(' \
                        <p class="text-center lead mt-5">No orders! </p>\
                        <p class="text-center lead">You\'ve delivered all orders, no orders to process.  </p>\
                    ');
                    
                   }
                }
                sendNotificationByChangeStateOrder($orderID);
            }   
                        
        }
    );
}
