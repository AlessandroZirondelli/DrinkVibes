<div class="container box-notifications p-5">
    <?php
        if((count($notificationsTypeOne)==0) && (count($notificationsTypeTwo)==0)):
    ?>
        <p> No notification ! You have already read all the notifications and delete them </p>
    <?php else: ?>

        <?php foreach($notificationsTypeOne as $notif):?>
            <div class="row">
                <div class="col-11">    
                    <div class="accordion accordion-flush" id="accordionFlushNotifTypeOne<?php echo $notif->getNotifID() ?>">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingNotifTypeOne<?php echo $notif->getNotifID() ?>">
                                <button class="accordion-button collapsed px-0 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNotifTypeOne<?php echo $notif->getNotifID() ?>" aria-expanded="false" aria-controls="flush-collapseNotifTypeOne<?php echo $notif->getNotifID() ?>">
                                    <?php if($type=="User"): ?>
                                            Change of state
                                    <?php elseif($type=="Express"):?>
                                            Order ready to dealivery    
                                    <?php elseif($type=="Admin"):?>
                                            New order
                                    <?php endif; ?>
                                </button>
                            </h2>
                                                    
                            <div id="flush-collapseNotifTypeOne<?php echo $notif->getNotifID() ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingNotifTypeOne<?php echo $notif->getNotifID() ?>" data-bs-parent="#accordionFlushNotifTypeOne<?php echo $notif->getNotifID() ?>">
                                <div class="accordion-body p-0">
                                    <?php if($type=="User"): //l'utente che entra nelle notifiche è User ?>
                                        <p>
                                            Order number: <?php echo $notif->getOrderRef(); ?> has changed state in : <?php echo $notif->getChangedState(); ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if($type=="Express"): ?>
                                        <p>
                                            Order number: <?php echo $notif->getOrderRef(); ?> is ready to delivery. We are waiting you !
                                        </p>
                                    <?php endif;?>
                                    <?php if($type=="Admin"):?>
                                        <p>
                                            New order number: <?php echo $notif->getOrderRef(); ?> by <?php echo $notif->getUserRef(); ?>  received ! You need to prepare: <?php echo $notif->getDescription(); ?> 
                                        </p>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>  <!-- FINE DELL'ACCORDION --> 
                </div>
                <div class="col-1 trash ">
                    <?php
                        $notifID =  $notif->getNotifID();
                        if($type=="User"){ //notifica cambio stato
                            $link="/DrinkVibes/utils/updateNotifications.php?notifType=stateChanged&notifID=".$notifID;
                        }
                        elseif($type=="Express"){ //notifica ordine ready
                            $link="/DrinkVibes/utils/updateNotifications.php?notifType=orderReady&notifID=".$notifID;
                        }
                        elseif($type=="Admin"){ //notifica nuovo ordine
                            $link="/DrinkVibes/utils/updateNotifications.php?notifType=newOrder&whois=Admin&notifID=".$notifID;
                        }
                    
                    
                    ?>
                    <a class="text-black" href="<?php echo $link;?>" title="Link icon cart"> <i class="bi bi-trash"></i> </a>   
                </div>
            </div>
        <?php endforeach; ?>
        
        <?php if($type!="Express"):?>
            <?php foreach($notificationsTypeTwo as $notif):?>
                <div class="row">
                    <div class="col-11">
                        <div class="accordion accordion-flush" id="accordionFlushNotifTypeTwo<?php echo $notif->getNotifID() ?>">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingNotifTypeTwo<?php echo $notif->getNotifID() ?>">
                                    <button class="accordion-button collapsed px-0 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNotifTypeTwo<?php echo $notif->getNotifID() ?>" aria-expanded="false" aria-controls="flush-collapseNotifTypeTwo<?php echo $notif->getNotifID() ?>">
                                        <?php if($type=="User"): ?>
                                            <div class="notif-type">
                                                New order
                                            </div>
                                        <?php elseif($type=="Admin"):?>
                                            <div class="notif-type">
                                                Article sold-out
                                            </div>
                                        <?php endif; ?>
                                    </button>
                                </h2>
                                                        
                                <div id="flush-collapseNotifTypeTwo<?php echo $notif->getNotifID() ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingNotifTypeTwo<?php echo $notif->getNotifID() ?>" data-bs-parent="#accordionFlushNotifTypeTwo<?php echo $notif->getNotifID() ?>">
                                    <div class="accordion-body p-0">
                                        <?php if($type=="User"): //l'utente che entra nelle notifiche è User ?>
                                            <p>
                                                You have ordered ! Order number: <?php echo $notif->getOrderRef(); ?>  Description: <?php echo $notif->getDescription(); ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if($type=="Admin"): ?>
                                            <p>
                                                Article number:  <?php echo $notif->getArticleIDRef(); ?>  with name: <?php echo $notif->getArticleNameRef(); ?>
                                            </p>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>  <!-- FINE DELL'ACCORDION --> 
                    </div>
                    <div class="col-1 trash ">
                    <?php
                        $notifID =  $notif->getNotifID();
                        if($type=="User"){ //notifica nuovo ordine per l'utente
                            $link="/DrinkVibes/utils/updateNotifications.php?notifType=newOrder&whois=User&notifID=".$notifID;
                        }
                        elseif($type=="Admin"){ //notifica soldout admin
                            $link="/DrinkVibes/utils/updateNotifications.php?notifType=soldout&notifID=".$notifID;
                        }
                    ?>
                        <a class="text-black" href="<?php echo $link;?>" title="Link icon cart"> <i class="bi bi-trash"></i> </a>   
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif;?>
    <?php endif;?>
    

</div> <!-- FINE DEL CONTAINER -->