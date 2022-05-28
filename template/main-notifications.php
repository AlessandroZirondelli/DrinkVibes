<div class="flex-wrapper">
    <h2 class="mb-0 text-center mt-4">Notifications </h2>
    <div class="container box-notifications py-2 mt-3">
        <?php
        if ((count($notificationsTypeOne) == 0) && (count($notificationsTypeTwo) == 0)) :
        ?>
            <p class="text-center lead"> No notification ! </p>
            <p class="text-center lead"> You've read all the notifications and delete them </p>
        <?php else : ?>
            <?php foreach ($notificationsTypeOne as $notif) : ?>
                <div class="row">
                    <div class="col-11">
                        <div class="accordion accordion-flush" id="accordionFlushNotifTypeOne<?php echo $notif->getNotifID() ?>">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingNotifTypeOne<?php echo $notif->getNotifID() ?>">
                                    <button class="accordion-button collapsed  " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNotifTypeOne<?php echo $notif->getNotifID() ?>" aria-expanded="false" aria-controls="flush-collapseNotifTypeOne<?php echo $notif->getNotifID() ?>">
                                        <?php if ($type == "User") : ?>
                                            Change of state
                                        <?php elseif ($type == "Express") : ?>
                                            Order ready to delivery
                                        <?php elseif ($type == "Admin") : ?>
                                            New order
                                        <?php endif; ?>
                                    </button>
                                </h2>

                                <div id="flush-collapseNotifTypeOne<?php echo $notif->getNotifID() ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingNotifTypeOne<?php echo $notif->getNotifID() ?>" data-bs-parent="#accordionFlushNotifTypeOne<?php echo $notif->getNotifID() ?>">
                                    <div class="accordion-body p-0 ms-4">
                                        <?php if ($type == "User") : // the user who enters the notifications is User
                                        ?>
                                            <p>
                                                Order number: <?php echo $notif->getOrderRef(); ?> has changed state in : <?php echo $notif->getChangedState(); ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if ($type == "Express") : ?>
                                            <p>
                                                Order number: <?php echo $notif->getOrderRef(); ?> is ready to delivery. We are waiting you !
                                            </p>
                                        <?php endif; ?>
                                        <?php if ($type == "Admin") : ?>
                                            <p>
                                                New order number: <?php echo $notif->getOrderRef(); ?> by <?php echo $notif->getUserRef(); ?> received ! You need to prepare:
                                                <ul>
                                                    <?php
                                                    $description = $notif->getDescription();
                                                    $list_art = explode(",",  $description );
                                                    foreach($list_art as $art){
                                                        if(strcmp($art,"") != 0 && strcmp($art," ") != 0 ){
                                                            echo "<li>"; echo $art; echo "</li>";   
                                                        }          
                                                    }
                                                    ?>
                                                </ul>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- ACCORDION ENDS -->
                    </div>
                    <div class="col-1 trash ps-0 ">
                        <?php
                        $notifID =  $notif->getNotifID();
                        if ($type == "User") { //NOTIFICATION CHANGE STATE OF ORDER
                            $link = "/DrinkVibes/utils/updateNotifications.php?notifType=stateChanged&notifID=" . $notifID;
                        } elseif ($type == "Express") { //NOTIFICATION ORDER READY TO DELIVERY
                            $link = "/DrinkVibes/utils/updateNotifications.php?notifType=orderReady&notifID=" . $notifID;
                        } elseif ($type == "Admin") { //NOTIFICATION NEW ORDER FOR ADMIN
                            $link = "/DrinkVibes/utils/updateNotifications.php?notifType=newOrder&whois=Admin&notifID=" . $notifID;
                        }
                        ?>
                        <a class="text-black" href="<?php echo $link; ?>" title="Trash"> <i class="bi bi-trash"></i> </a>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if ($type != "Express") : ?>
                <?php foreach ($notificationsTypeTwo as $notif) : ?>
                    <div class="row">
                        <div class="col-11">
                            <div class="accordion accordion-flush" id="accordionFlushNotifTypeTwo<?php echo $notif->getNotifID() ?>">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingNotifTypeTwo<?php echo $notif->getNotifID() ?>">
                                        <button class="accordion-button collapsed  " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNotifTypeTwo<?php echo $notif->getNotifID() ?>" aria-expanded="false" aria-controls="flush-collapseNotifTypeTwo<?php echo $notif->getNotifID() ?>">
                                            <?php if ($type == "User") : ?>
                                                New order
                                            <?php elseif ($type == "Admin") : ?>
                                                Article sold-out
                                            <?php endif; ?>
                                        </button>
                                    </h2>

                                    <div id="flush-collapseNotifTypeTwo<?php echo $notif->getNotifID() ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingNotifTypeTwo<?php echo $notif->getNotifID() ?>" data-bs-parent="#accordionFlushNotifTypeTwo<?php echo $notif->getNotifID() ?>">
                                        <div class="accordion-body p-0 ms-4">
                                            <?php if ($type == "User") : //Who enters in notification are is User 
                                            ?>
                                                <p>
                                                    You have ordered ! Order number: <?php echo $notif->getOrderRef(); ?>
                                                    <div>
                                                        Description:
                                                        <ul>
                                                            <?php
                                                            $description = $notif->getDescription();
                                                            $list_art = explode(",",  $description );
                                                            foreach($list_art as $art){
                                                                if(strcmp($art,"") != 0 && strcmp($art," ") != 0 ){
                                                                    echo "<li>"; echo $art; echo "</li>";   
                                                                }
                                                               
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </p>
                                            <?php endif; ?>
                                            <?php if ($type == "Admin") : ?>
                                                <p>
                                                    Article number: <?php echo $notif->getArticleIDRef(); ?> with name: <?php echo $notif->getArticleNameRef(); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- ACCORDION ENDS -->
                        </div>
                        <div class="col-1 trash ps-0 ">
                            <?php
                            $notifID =  $notif->getNotifID();
                            if ($type == "User") { //NOTIFICATION NEW ORDER FOR USER
                                $link = "/DrinkVibes/utils/updateNotifications.php?notifType=newOrder&whois=User&notifID=" . $notifID;
                            } elseif ($type == "Admin") { //NOTIFICATION SOLDOUT FOR ADMIN
                                $link = "/DrinkVibes/utils/updateNotifications.php?notifType=soldout&notifID=" . $notifID;
                            }
                            ?>
                            <a class="text-black" href="<?php echo $link; ?>" title="Trash"> <i class="bi bi-trash"></i> </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>


    </div> <!-- CONTAINER ENDS -->
</div>