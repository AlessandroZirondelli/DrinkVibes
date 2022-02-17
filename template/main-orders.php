<div class="flex-wrapper">
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 pt-5">
                <h2 class="h2 text-black ">Orders</h2>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-orders-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">All orders</button>
                    </li>
                    
                    <?php if($type!="Express"): ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pending-orders-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">Orders being processed</button>
                    </li>  
                    <?php  endif;?> 
                </ul>
                <!-- TAB1 -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="all-orders-tab"> 
                        
                        <?php if(count($ordersTab1)==0): ?>
                            <p class="text-center lead mt-5">No orders! </p>
                            <p class="text-center lead">You've delivered all orders, no orders to process.  </p>
                        <?php else: ?>   
                            <!--  Qui c'era il PHP del controllo type express  -->
                                <?php 
                                    //$accordionFlushID=1;
                                    //$flushHeading=1;
                                    //$flushCollapse=1;
                                    foreach($ordersTab1 as $tmp): 
                                ?>
                                        <div class="container">
                                            <div class="row"> <!--  INIZZIA LA ROW-->
                                                <div class="col-4 col-md-4 p-0">
                                                    <div class="ordered-on">
                                                        Ordered on: 
                                                    </div>
                                                    <div>
                                                        <?php echo $tmp->getDate(); ?>
                                                    </div>
                                                </div>
                                                <div class="col-5 col-md-4 p-0">
                                                    <div class="ordered-number">
                                                        Order number: 
                                                    </div>
                                                    <div>
                                                        <?php echo $tmp->getOrderID(); ?>
                                                    </div>
                                                </div>
                                    
                                                <!-- qui devo fare il controllo del type user. Se amin o fattorino faccio uscire drop down -->
                                                
                                                <?php if ($type!="User"): ?>
                                                    <div class="col-3 col-md-4 p-0">
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle mt-1" type="button" id="dropdownStatusTabOne<?php echo $tmp->getOrderID();?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Status <!-- Questo si aggiornerà in base al valore selezionato ed attuale dello stato -->
                                                            </button>
                                                            <ul class="dropdown-menu" id="tabOne<?php echo $tmp->getOrderID(); ?>" aria-labelledby="dropdownStatusTabOne<?php echo $tmp->getOrderID();?>">
                                                                <?php if($type=="Admin"): ?> <li><a class="dropdown-item <?php if($tmp->getState()=='To prepare'){echo 'active';} ?>" href="#">To prepare</a></li> <?php endif; ?>
                                                                <!-- Il fattorino ha solo 3 opzioni. NON ha "To prepare"-->
                                                                <li><a class="dropdown-item <?php if($tmp->getState()=='Ready to delivery'){echo 'active';} ?>" href="#">Ready to delivery</a></li> <!--Per disabilitarlo aggiungere disabled come classe al tag <a> -->
                                                                <li><a class="dropdown-item <?php if($tmp->getState()=='Shipped'){echo 'active';} ?>" href="#">Shipped</a></li>
                                                                <li><a class="dropdown-item <?php if($tmp->getState()=='Delivered'){echo 'active';} ?>" href="#">Delivered</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                <?php else: ?> <!-- Se è un utente di tipo User -->
                                                    <div class="col-3 col-md-4 p-0">
                                                        <div class="state">
                                                            State:
                                                        </div>
                                                        <div> 
                                                            <?php echo $tmp->getState(); ?> 
                                                        </div>
                                                    </div>  
                                                <?php endif; ?>                   

                                            </div> <!-- CHIUDE LA ROW -->
                                
                                            <div class="accordion accordion-flush" id="<?php echo 'accordionFlushTabOne'.$tmp->getOrderID(); ?>">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="<?php echo 'flush-headingTabOne'.$tmp->getOrderID();?>">
                                                        <button class="accordion-button collapsed px-0 " type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'flush-collapseTabOne'.$tmp->getOrderID(); ?>" aria-expanded="false" aria-controls="<?php echo 'flush-collapseTabOne'.$tmp->getOrderID(); ?>">
                                                            More info
                                                        </button>
                                                    </h2>
                                        
                                                    <div id="<?php echo 'flush-collapseTabOne'.$tmp->getOrderID(); ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'flush-headingTabOne'.$tmp->getOrderID(); ?>" data-bs-parent="#<?php echo 'accordionFlushTabOne'.$tmp->getOrderID(); ?>">
                                                        <div class="accordion-body p-0">
                                                            <?php if($type!="User"): ?>
                                                                <div>
                                                                    Recipient: <?php echo $manager->getRecipientName($tmp->getOrderID()); ?>   <?php if($type=="Admin"){ echo "(".$tmp->getUserID().")";} ?>
                                                                </div>
                                                            <?php endif;?>
                                                            <div>
                                                                Total: <?php echo $tmp->getTotal(); ?> $
                                                            </div>
                                                            <?php foreach($tmp->getOrderDetails() as $detail): ?>
                                                                <div>
                                                                    <?php echo $detail->getQuantity()." ".$detail->getArticleName()." ".$detail->getSubtotal()." $";?>    
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  <!-- FINE DELL'ACCORDION -->   
                                
                                        </div> <!-- FINE DEL CONTAINER -->

                                        <?php 
                                            //$accordionFlushID=$accordionFlushID+1;
                                            //$flushHeading=$flushHeading+1;
                                            //$flushCollapse=$flushCollapse+1;
                                        ?>

                                <?php                           
                                    endforeach; 
                                ?>
                            <!-- Qui c'era il php del controllo typr fattorino -->




            
                        <?php endif; //endif del controllo se ci sono ordino o meno?>
                    
                        
                        <!--  AGGIUNGI QUA SOTTO I NUOVI CONTAINER !!! RICORDA DI : 
                        -aggiungere in modo dinamico dei nuovi container con nuove tabelle relative agli ordini
                        - cambiare  in modo dinamico all'interno di AccordionFlush , l'id AccordionFlushExample 
                        che deve diventare progressivo (AccordionFlush1 ecc.. ) e poi 
                        in data-bs-target #flushCOllapseOne in #flush collpaseTwo- three-four ecc..-->

                    </div>
                    
                    <?php if($type!="Express"): ?>
                        <!-- TAB2 -->
                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pending-orders-tab">  
                            <?php if(count($ordersTab2)==0): ?>
                                <p class="text-center lead mt-5">No orders! </p>
                                <p class="text-center lead">All orders has already shipped! </p>
                            <?php else: ?>   
                            <!--  Qui c'era il PHP del controllo type express  -->
                                <?php 
                                    
                                    foreach($ordersTab2 as $tmp): 
                                ?>
                                        <div class="container">
                                            <div class="row"> <!--  INIZZIA LA ROW-->
                                                <div class="col-4 col-md-4 p-0">
                                                    <div class="ordered-on">
                                                        Ordered on: 
                                                    </div>
                                                    <div>
                                                        <?php echo $tmp->getDate(); ?>
                                                    </div>
                                                </div>
                                                <div class="col-5 col-md-4 p-0">
                                                    <div class="ordered-number">
                                                        Order number: 
                                                    </div>
                                                    <div>
                                                        <?php echo $tmp->getOrderID(); ?>
                                                    </div>
                                                </div>
                                    
                                                <!-- qui devo fare il controllo del type user. Se amin o fattorino faccio uscire drop down -->
                                                
                                                <?php if ($type!="User"): ?>
                                                    <div class="col-3 col-md-4 p-0">
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle mt-1" type="button" id="dropdownStatusTabTwo<?php echo $tmp->getOrderID();?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Status <!-- Questo si aggiornerà in base al valore selezionato ed attuale dello stato -->
                                                            </button>
                                                            <ul class="dropdown-menu" id="tabTwo<?php echo $tmp->getOrderID(); ?>" aria-labelledby="dropdownStatusTabTwo<?php echo $tmp->getOrderID();?>">
                                                                <?php if($type=="Admin"): ?> <li><a class="dropdown-item <?php if($tmp->getState()=='To prepare'){echo 'active';} ?>" href="#">To prepare</a></li> <?php endif; ?>
                                                                <!-- Il fattorino ha solo 3 opzioni. NON ha "To prepare"-->
                                                                <li><a class="dropdown-item <?php if($tmp->getState()=='Ready to delivery'){echo 'active';} ?>" href="#">Ready to delivery</a></li> <!--Per disabilitarlo aggiungere disabled come classe al tag <a> -->
                                                                <li><a class="dropdown-item <?php if($tmp->getState()=='Shipped'){echo 'active';} ?>" href="#">Shipped</a></li>
                                                                <li><a class="dropdown-item <?php if($tmp->getState()=='Delivered'){echo 'active';} ?>" href="#">Delivered</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                <?php else: ?> <!-- Se è un utente di tipo User -->
                                                    <div class="col-3 col-md-4 p-0">
                                                        <div>
                                                            State:
                                                        </div>
                                                        <div> 
                                                            <?php echo $tmp->getState(); ?> 
                                                        </div>
                                                    </div>  
                                                <?php endif; ?>                   

                                            </div> <!-- CHIUDE LA ROW -->
                                
                                            <div class="accordion accordion-flush" id="<?php echo 'accordionFlushTabTwo'.$tmp->getOrderID(); ?>">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="<?php echo 'flush-headingTabTwo'.$tmp->getOrderID(); ?>">
                                                        <button class="accordion-button collapsed px-0" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'flush-collapseTabTwo'.$tmp->getOrderID(); ?>" aria-expanded="false" aria-controls="<?php echo 'flush-collapseTabTwo'.$tmp->getOrderID(); ?>">
                                                            More info
                                                        </button>
                                                    </h2>
                                        
                                                    <div id="<?php echo 'flush-collapseTabTwo'.$tmp->getOrderID(); ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'flush-headingTabTwo'.$tmp->getOrderID(); ?>" data-bs-parent=" <?php echo '#accordionFlushTabTwo'.$tmp->getOrderID(); ?>">
                                                        <div class="accordion-body p-0">
                                                            <?php if($type=="Express"): ?>
                                                                <div>
                                                                    Recipient: <?php echo $manager->getRecipientName($tmp->getOrderID()); ?> 
                                                                </div>
                                                            <?php endif;?>
                                                            <div>
                                                                Total: <?php echo $tmp->getTotal(); ?> $
                                                            </div>
                                                            <?php foreach($tmp->getOrderDetails() as $detail): ?>
                                                                <div>
                                                                    <?php echo $detail->getQuantity()." ".$detail->getArticleName()." ".$detail->getSubtotal()." $";?>    
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  <!-- FINE DELL'ACCORDION -->   
                                
                                        </div> <!-- FINE DEL CONTAINER -->

                                        <?php 
                                            //$accordionFlushID=$accordionFlushID+1;
                                            //$flushHeading=$flushHeading+1;
                                            //$flushCollapse=$flushCollapse+1;
                                        ?>

                                <?php                           
                                    endforeach; 
                                ?>

                            <?php endif; //endif del controllo se ci sono ordino o meno?>
                        </div>
                    <?php  endif; //endif del controllo se è fattorino o meno?> 
                
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</div>