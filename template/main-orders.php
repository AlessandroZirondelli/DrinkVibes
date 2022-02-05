<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8 pt-5">
            <h2 class="h2 text-black ">Orders</h2>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-orders-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="home" aria-selected="true">All orders</button>
                </li>
                
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pending-orders-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="profile" aria-selected="false">Orders being processed</button>
                </li>   
            </ul>
            <!-- TAB1 -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="all-orders-tab"> 
                    
                <?php if(count($ordersTab1)==0): ?>
                    <p>No orders </p>
                <?php endif;?>
                
                
                
                
                    

                    
                    
                    <!--  AGGIUNGI QUA SOTTO I NUOVI CONTAINER !!! RICORDA DI : 
                     -aggiungere in modo dinamico dei nuovi container con nuove tabelle relative agli ordini
                    - cambiare  in modo dinamico all'interno di AccordionFlush , l'id AccordionFlushExample 
                    che deve diventare progressivo (AccordionFlush1 ecc.. ) e poi 
                    in data-bs-target #flushCOllapseOne in #flush collpaseTwo- three-four ecc..-->




                </div>
                
                
                    <!-- TAB2 -->
                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pending-orders-tab">  
                        <?php if(count($ordersTab1)==0): ?>
                            <p>No orders </p>
                        <?php endif;?>
                    </div>

            
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>
                                         
                 