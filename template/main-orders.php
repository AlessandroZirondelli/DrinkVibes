<?php
echo '
<div class="container">
    <div class="row">
        <div class="col-md-2 pt-5">
        </div>

        <div class="col-md-8 pt-5">
            <h2 class="h2 text-black ">Orders</h2>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-orders-tab" data-bs-toggle="tab" data-bs-target="#allorders" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pending-orders-tab" data-bs-toggle="tab" data-bs-target="#pendingorders" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                </li>
                
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="allorders" role="tabpanel" aria-labelledby="all-orders-tab"> 
                    <div class="container">
                        <div class="row">
                            <div class="col-3 p-0">
                                <div>
                                    Order was issued on: 
                                </div>
                                <div>
                                    23 september 2020
                                </div>
                            </div>
                            <div class="col-2 p-0">
                                <div>
                                    Total 
                                </div>
                                <div>
                                    1500 $
                                </div>
                            </div>

                            <div class="col-2 p-0">
                                <div>
                                    Shipped to 
                                </div>
                                <div>
                                    Campus Cesena
                                </div>
                            </div>

                            
                        </div>
                        <div>
                            bellissimi
                        </div>
                        <div>
                            bellissimi
                        </div>
                        
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-3">
                            cicic
                            </div>
                            <div class="col-5">
                            aaa
                            </div>
                            <div class="col-4">
                            cixaaaxcic
                            </div>
                        </div>
                        <div>
                            bellissimi
                        </div>
                        <div>
                            bellissimi
                        </div>
                        
                    </div>
    
                </div>
                <div class="tab-pane fade" id="pendingorders" role="tabpanel" aria-labelledby="pending-orders-tab">  bb</div>

            </div>
        </div>

        <div class="col-md-8 pt-5">
        </div>
    </div>
</div>
'

?>