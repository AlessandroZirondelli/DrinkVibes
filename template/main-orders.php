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
                    
                <?php if(!isset($orders)): ?>
                    <p>No orders </p>
                <?php endif;?>

                <?php 
                $accordionFlushID=1;
                $flushHeading=1;
                $flushCollapse=1;
                foreach($orders as $tmp): 
                ?>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-4 col-md-4 p-0">
                                <div>
                                    Ordered on: 
                                </div>
                                <div>
                                    <?php echo $tmp->getDate(); ?>
                                </div>
                            </div>
                            <div class="col-5 col-md-4 p-0">
                                <div>
                                    Order number: 
                                </div>
                                <div>
                                    <?php echo $tmp->getOrderID(); ?>
                                </div>
                            </div>
                            <div class="col-3 col-md-4 p-0">
                                <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownStatus" data-bs-toggle="dropdown" aria-expanded="false">
                                            Status <!-- Questo si aggiornerà in base al valore selezionato ed attuale dello stato -->
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownStatus">
                                            <li><a class="dropdown-item active" href="#">To prepare</a></li> <!-- Per rendere selezionato un elemento devo aggiungere active -->
                                             <!-- Qui bisogna fare il controllo che se l'utente è un fattorino ha solo queste 3 opzioni sotto -->
                                            <li><a class="dropdown-item" href="#">Ready to delivery</a></li> <!--Per disabilitarlo aggiungere disabled come classe al tag <a> -->
                                            <li><a class="dropdown-item" href="#">Shipped</a></li>
                                            <li><a class="dropdown-item" href="#">Delivered</a></li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                        

                        <div class="accordion accordion-flush" id="<?php echo 'accordionFlush'.$accordionFlushID ?>">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="<?php echo 'flush-heading'.$flushHeading ?>">
                                    <button class="accordion-button collapsed px-0" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'flush-collapse'.$flushCollapse ?>" aria-expanded="false" aria-controls="<?php echo 'flush-collapse'.$flushCollapse ?>">
                                        More info
                                    </button>
                                </h2>
                                
                                <div id="<?php echo 'flush-collapse'.$flushCollapse ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'flush-heading'.$flushHeading ?>" data-bs-parent="#<?php echo 'accordionFlush'.$accordionFlushID ?>">
                                    <div class="accordion-body p-0">
                                    <div>
                                        Total: <?php echo $tmp->getTotal(); ?>
                                    </div>
                                    <?php foreach($tmp->getOrderDetails() as $detail): ?>
                                        <div>
                                            <?php echo $detail->getQuantity()." ".$detail->getArticleName(); ?>
                                        </div>
                                    <?php endforeach; ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>     
                        
                    </div>

                    <?php 
                        $accordionFlushID=$accordionFlushID+1;
                        $flushHeading=$flushHeading+1;
                        $flushCollapse=$flushCollapse+1;
                    ?>

                <?php 
                    //echo $accordionFlushID;
                endforeach; ?>
                    

                    
                    
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
                                         
                 