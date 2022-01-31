<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8 pt-5">
            <h2 class="h2 text-black ">Orders</h2>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-orders-tab" data-bs-toggle="tab" data-bs-target="#allorders" type="button" role="tab" aria-controls="home" aria-selected="true">All orders</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pending-orders-tab" data-bs-toggle="tab" data-bs-target="#pendingorders" type="button" role="tab" aria-controls="profile" aria-selected="false">Orders being processed</button>
                </li>   
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="allorders" role="tabpanel" aria-labelledby="all-orders-tab"> 
                    <div class="container">
                        <div class="row">
                            <div class="col-4 col-md-4 p-0">
                                <div>
                                    Ordered on: 
                                </div>
                                <div>
                                    23/09/2021
                                </div>
                            </div>
                            <div class="col-5 col-md-4 p-0">
                                <div>
                                    Order number: 
                                </div>
                                <div>
                                    472736
                                </div>
                            </div>
                            <div class="col-3 col-md-4 p-0">
                                <div>
                                    Total: 
                                </div>
                                <div>
                                    1500 $
                                </div>
                            </div>
                        </div>
                        

                        <div class="accordion accordion-flush" id="accordionFlush1">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed px-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        More info
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush1">
                                    <div class="accordion-body p-0">
                                        <div>
                                            1 Coca-Cola
                                        </div>
                                        <div>
                                            1 Mojito
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        
                    </div>

                  
                    <div class="container">
                        <div class="row">
                            <div class="col-4 col-md-4 p-0">
                                <div>
                                    Ordered on: 
                                </div>
                                <div>
                                    23/09/2021
                                </div>
                            </div>
                            <div class="col-5 col-md-4 p-0">
                                <div>
                                    Order number: 
                                </div>
                                <div>
                                    472736
                                </div>
                            </div>
                            <div class="col-3 col-md-4 p-0">
                                <div>
                                    Total: 
                                </div>
                                <div>
                                    1500 $
                                </div>
                            </div>
                        </div>
                        

                        <div class="accordion accordion-flush" id="accordionFlush2">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed px-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        More info
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush2">
                                    <div class="accordion-body p-0">
                                        <div>
                                            1 Coca-Cola
                                        </div>
                                        <div>
                                            1 Mojito
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-4 col-md-4 p-0">
                                <div>
                                    Ordered on: 
                                </div>
                                <div>
                                    23/09/2021
                                </div>
                            </div>
                            <div class="col-5 col-md-4 p-0">
                                <div>
                                    Order number: 
                                </div>
                                <div>
                                    472736
                                </div>
                            </div>
                            <div class="col-3 col-md-4 p-0">
                                <div>
                                    Total: 
                                </div>
                                <div>
                                    1500 $
                                </div>
                            </div>
                        </div>
                        

                        <div class="accordion accordion-flush" id="accordionFlush3">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed px-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        More info
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush3">
                                    <div class="accordion-body p-0">
                                        <div>
                                            1 Coca-Cola
                                        </div>
                                        <div>
                                            1 Mojito
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        
                    </div>
                    
                    <!--  AGGIUNGI QUA SOTTO I NUOVI CONTAINER !!! RICORDA DI : 
                     -aggiungere in modo dinamico dei nuovi container con nuove tabelle relative agli ordini
                    - cambiare  in modo dinamico all'interno di AccordionFlush , l'id AccordionFlushExample 
                    che deve diventare progressivo (AccordionFlush1 ecc.. ) e poi 
                    in data-bs-target #flushCOllapseOne in #flush collpaseTwo- three-four ecc..-->




                </div>


                <div class="tab-pane fade" id="pendingorders" role="tabpanel" aria-labelledby="pending-orders-tab">  bb</div>
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>
                                         
                 