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

                    <?php if ($type != "Express") : ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pending-orders-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">Orders being processed</button>
                        </li>
                    <?php endif; ?>
                </ul>
                <!-- TAB1 -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="all-orders-tab">

                        <?php if ((count($ordersTab1) == 0) && ($type == "Express")) : ?>
                            <p class="text-center lead mt-5">No orders! </p>
                            <p class="text-center lead">You've delivered all orders, no orders to process. </p>
                        <?php elseif ((count($ordersTab1) == 0) && ($type == "Admin")) : ?>
                            <p class="text-center lead mt-5">No orders! </p>
                            <p class="text-center lead">Customers haven't ordered yet </p>
                        <?php elseif ((count($ordersTab1) == 0) && ($type == "User")) : ?>
                            <p class="text-center lead mt-5">No orders! </p>
                            <p class="text-center lead">You haven't ordered yet </p>
                        <?php else : ?>
                            <?php
                            foreach ($ordersTab1 as $tmp) :
                            ?>
                                <div class="container">
                                    <!-- CONTAINER STARTS -->
                                    <div class="row">
                                        <!-- ROW START-->
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

                                        <?php if ($type != "User") : ?>
                                            <div class="col-3 col-md-4 p-0">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle mt-1" type="button" id="dropdownStatusTabOne<?php echo $tmp->getOrderID(); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Status
                                                    </button>
                                                    <ul class="dropdown-menu" id="tabOne<?php echo $tmp->getOrderID(); ?>" aria-labelledby="dropdownStatusTabOne<?php echo $tmp->getOrderID(); ?>">
                                                        <?php if ($type == "Admin") : ?> <li><a class="dropdown-item <?php if ($tmp->getState() == 'To prepare') {
                                                                                                                        echo 'active';
                                                                                                                    } ?>" href="#">To prepare</a></li> <?php endif; ?>
                                                        <!-- Express has only  3 options. It hasn't got "To prepare"-->
                                                        <li><a class="dropdown-item <?php if ($tmp->getState() == 'Ready to delivery') {
                                                                                        echo 'active';
                                                                                    } ?>" href="#">Ready to delivery</a></li>
                                                        <!--Per disabilitarlo aggiungere disabled come classe al tag <a> -->
                                                        <li><a class="dropdown-item <?php if ($tmp->getState() == 'Shipped') {
                                                                                        echo 'active';
                                                                                    } ?>" href="#">Shipped</a></li>
                                                        <li><a class="dropdown-item <?php if ($tmp->getState() == 'Delivered') {
                                                                                        echo 'active';
                                                                                    } ?>" href="#">Delivered</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        <?php else : ?>
                                            <!-- If it's a User -->
                                            <div class="col-3 col-md-4 p-0">
                                                <div class="state">
                                                    State:
                                                </div>
                                                <div>
                                                    <?php echo $tmp->getState(); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                    </div> <!-- ROW ENDS -->

                                    <div class="accordion accordion-flush" id="<?php echo 'accordionFlushTabOne' . $tmp->getOrderID(); ?>">
                                        <!-- ACCORDION STARTS -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="<?php echo 'flush-headingTabOne' . $tmp->getOrderID(); ?>">
                                                <button class="accordion-button collapsed px-0 " type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'flush-collapseTabOne' . $tmp->getOrderID(); ?>" aria-expanded="false" aria-controls="<?php echo 'flush-collapseTabOne' . $tmp->getOrderID(); ?>">
                                                    More info
                                                </button>
                                            </h2>

                                            <div id="<?php echo 'flush-collapseTabOne' . $tmp->getOrderID(); ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'flush-headingTabOne' . $tmp->getOrderID(); ?>" data-bs-parent="#<?php echo 'accordionFlushTabOne' . $tmp->getOrderID(); ?>">
                                                <div class="accordion-body p-0">
                                                    <?php if ($type != "User") : ?>
                                                        <div>
                                                            Recipient: <?php echo $manager->getRecipientName($tmp->getOrderID()); ?> <?php if ($type == "Admin") {
                                                                                                                                            echo "(" . $tmp->getUserID() . ")";
                                                                                                                                        } ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div>
                                                        Total: <?php echo $tmp->getTotal(); ?> $
                                                    </div>
                                                    <?php foreach ($tmp->getOrderDetails() as $detail) : ?>
                                                        <?php if ($detail->getArticleName() == "Custom drink") : ?>
                                                            <div>
                                                                <span> <?php echo $detail->getQuantity(); ?> </span>
                                                                <a class="text-dark" href="infodrink.php?orderID=<?php echo $detail->getOrderID(); ?>&articID=<?php echo $detail->getArticleID(); ?>">Custom Drink</a>
                                                                <span> <?php echo $detail->getSubtotal() . " $"; ?> </span>
                                                            </div>
                                                        <?php else : ?>
                                                            <div>
                                                                <?php echo $detail->getQuantity() . " " . $detail->getArticleName() . " " . $detail->getSubtotal() . " $"; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- ACCORDION ENDS -->

                                </div> <!-- CONTAINER ENDS -->
                            <?php
                            endforeach;
                            ?>
                        <?php endif; //endif of controls if there are orders
                        ?>
                    </div> <!-- TAB PANE 1 ENDS -->

                    <?php if ($type != "Express") : ?>
                        <!-- Check if it's a User or Admin -->
                        <!-- TAB2 -->
                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pending-orders-tab">
                            <?php if (count($ordersTab2) == 0) : ?>
                                <p class="text-center lead mt-5">No orders! </p>
                                <p class="text-center lead">All orders has already delivered! </p>
                            <?php else : ?>
                                <?php
                                foreach ($ordersTab2 as $tmp) :
                                ?>
                                    <div class="container">
                                        <div class="row">
                                            <!--  ROW STARTS-->
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

                                            <?php if ($type != "User") : ?>
                                                <div class="col-3 col-md-4 p-0">
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle mt-1" type="button" id="dropdownStatusTabTwo<?php echo $tmp->getOrderID(); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Status
                                                        </button>
                                                        <ul class="dropdown-menu" id="tabTwo<?php echo $tmp->getOrderID(); ?>" aria-labelledby="dropdownStatusTabTwo<?php echo $tmp->getOrderID(); ?>">
                                                            <?php if ($type == "Admin") : ?> <li><a class="dropdown-item <?php if ($tmp->getState() == 'To prepare') {
                                                                                                                            echo 'active';
                                                                                                                        } ?>" href="#">To prepare</a></li> <?php endif; ?>
                                                            <!-- Express has only 3 options. It hasn't got "To prepare"-->
                                                            <li><a class="dropdown-item <?php if ($tmp->getState() == 'Ready to delivery') {
                                                                                            echo 'active';
                                                                                        } ?>" href="#">Ready to delivery</a></li>
                                                            <!--To disable it add 'disabled' as a class to the <a> tag -->
                                                            <li><a class="dropdown-item <?php if ($tmp->getState() == 'Shipped') {
                                                                                            echo 'active';
                                                                                        } ?>" href="#">Shipped</a></li>
                                                            <li><a class="dropdown-item <?php if ($tmp->getState() == 'Delivered') {
                                                                                            echo 'active';
                                                                                        } ?>" href="#">Delivered</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            <?php else : ?>
                                                <!-- If it's a user -->
                                                <div class="col-3 col-md-4 p-0">
                                                    <div>
                                                        State:
                                                    </div>
                                                    <div>
                                                        <?php echo $tmp->getState(); ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                        </div> <!-- ROW ENDS -->

                                        <div class="accordion accordion-flush" id="<?php echo 'accordionFlushTabTwo' . $tmp->getOrderID(); ?>">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="<?php echo 'flush-headingTabTwo' . $tmp->getOrderID(); ?>">
                                                    <button class="accordion-button collapsed px-0" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'flush-collapseTabTwo' . $tmp->getOrderID(); ?>" aria-expanded="false" aria-controls="<?php echo 'flush-collapseTabTwo' . $tmp->getOrderID(); ?>">
                                                        More info
                                                    </button>
                                                </h2>

                                                <div id="<?php echo 'flush-collapseTabTwo' . $tmp->getOrderID(); ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'flush-headingTabTwo' . $tmp->getOrderID(); ?>" data-bs-parent=" <?php echo '#accordionFlushTabTwo' . $tmp->getOrderID(); ?>">
                                                    <div class="accordion-body p-0">
                                                        <?php if ($type == "Express") : ?>
                                                            <div>
                                                                Recipient: <?php echo $manager->getRecipientName($tmp->getOrderID()); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div>
                                                            Total: <?php echo $tmp->getTotal(); ?> $
                                                        </div>
                                                        <?php foreach ($tmp->getOrderDetails() as $detail) : ?>
                                                            <?php if ($detail->getArticleName() == "Custom drink") : ?>
                                                                <div>
                                                                    <span> <?php echo $detail->getQuantity(); ?> </span>
                                                                    <a class="text-dark" href="infodrink.php?orderID=<?php echo $detail->getOrderID(); ?>&articID=<?php echo $detail->getArticleID(); ?>">Custom Drink</a>
                                                                    <span> <?php echo $detail->getSubtotal() . " $"; ?> </span>
                                                                </div>
                                                            <?php else : ?>
                                                                <div>
                                                                    <?php echo $detail->getQuantity() . " " . $detail->getArticleName() . " " . $detail->getSubtotal() . " $"; ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- ACCORDION STARTS -->

                                    </div> <!-- CONTAINER ENDS -->
                                <?php
                                endforeach;
                                ?>

                            <?php endif; //endif of control if there are orders or not
                            ?>
                        </div>
                    <?php endif; //endif of control if it is espress or not
                    ?>

                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</div>