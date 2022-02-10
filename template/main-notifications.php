<div class="container p-5 my-5">
    <?php foreach($notificationsTypeOne as $notif):?>
        <div class="accordion accordion-flush" id="accordionFlushNotif<?php echo $notif->getNotifID() ?>">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingNotif<?php echo $notif->getNotifID() ?>">
                    <button class="accordion-button collapsed px-0 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNotif<?php echo $notif->getNotifID() ?>" aria-expanded="false" aria-controls="flush-collapseNotif<?php echo $notif->getNotifID() ?>">
                        Notification 1
                    </button>
                </h2>
                                        
                <div id="flush-collapseNotif<?php echo $notif->getNotifID() ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingNotif<?php echo $notif->getNotifID() ?>" data-bs-parent="#accordionFlushNotif<?php echo $notif->getNotifID() ?>">
                    <div class="accordion-body p-0">
                        <?php if($type=="User"): //l'utente che entra nelle notifiche è User ?>
                            <p>
                                Order number <?php echo $notif->getOrderRef(); ?> has changed state in : <?php echo $notif->getChangedState(); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <div>  <!-- FINE DELL'ACCORDION --> 
    <?php endforeach; ?>
</div> <!-- FINE DEL CONTAINER -->