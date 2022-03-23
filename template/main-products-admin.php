<h1 class="p-3">Shop Products</h1>
<div class="container mb-5 p-0">
    <div class="row">
        
    <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
                <div class="card-inner">
                    <img class="card-img rounded-0" src="assets/img/i.png">       
                </div>
                <div class="card-body pb-0 px-2">
                <input type="text" class="form-control form-rounded" id="name<?php echo $products["productID"]; ?>" placeholder="Quantity(mL)">
                    <div class="h3 text-decoration-none pb-3" id="name<?php echo $products["productID"]; ?>"><?php echo $products["name"]; echo $products["qtystock"] == "0" ? " [Sold out]" : ""?></div>
                               
                    <div class="mx-1">
                        <hr class="line my-0">
                    </div>

                    <div class="accordion accordion-flush" id="accordionFlush<?php echo $products["productID"]; ?>">
                            <div class="accordion-item">
                                <div class="accordion-header<?php echo $products["productID"]; ?>" id="flush-heading<?php echo $products["productID"]; ?>"> 
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $products["productID"]; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $products["productID"]; ?>">
                                    <h5>Details</h5>
                                </button>
                            </div>
                            <div id="flush-collapse<?php echo $products["productID"]; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $products["productID"]; ?>" data-bs-parent="#accordionFlush<?php echo $products["productID"]; ?>">
                            
                            <div class="accordion-body<?php echo $products["productID"]; ?>">Description:<br><?php echo $products["description"]; ?><br>Quantity available: <?php echo $products["qtystock"] . " unity";?></div>
        
                        </div>
                    </div>
                </div>
                <div class="mx-1">
                    <hr class="line my-0">
                </div>
                <div class="d-flex align-items-center justify-content-between py-3 px-6">
                    <div class="h4"><span>&#8364;</span><?php echo $products["price"]; ?>/pz</div>
                    <div> <button class="btn btn-dark text-uppercase"  >Add</button> </div> 
                </div>
            </div>
            </div>
        </div>  











        <?php foreach($templateParams["All"] as $products): ?> 
        <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
                <div class="card-inner">
                    <img class="card-img rounded-0" src="assets/img/i.png">       
                </div>
                <div class="card-body pb-0 px-2">

                    <div class="h3 text-decoration-none pb-3" id="name<?php echo $products["productID"]; ?>"><?php echo $products["name"]; echo $products["qtystock"] == "0" ? " [Sold out]" : ""?></div>
                               
                    <div class="mx-1">
                        <hr class="line my-0">
                    </div>

                    <div class="accordion accordion-flush" id="accordionFlush<?php echo $products["productID"]; ?>">
                            <div class="accordion-item">
                                <div class="accordion-header<?php echo $products["productID"]; ?>" id="flush-heading<?php echo $products["productID"]; ?>"> 
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $products["productID"]; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $products["productID"]; ?>">
                                    <h5>Details</h5>
                                </button>
                            </div>
                            <div id="flush-collapse<?php echo $products["productID"]; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $products["productID"]; ?>" data-bs-parent="#accordionFlush<?php echo $products["productID"]; ?>">
                            
                            <div class="accordion-body<?php echo $products["productID"]; ?>">Description:<br><?php echo $products["description"]; ?><br>Quantity available: <?php echo $products["qtystock"] . " unity";?></div>
        
                        </div>
                    </div>
                </div>
                <div class="mx-1">
                    <hr class="line my-0">
                </div>
                <div class="d-flex align-items-center justify-content-between py-3 px-6">
                    <div class="h4"><span>&#8364;</span><?php echo $products["price"]; ?>/pz</div>
                    <div> <button class="btn btn-dark text-uppercase"  >Add</button> </div> 
                </div>
            </div>
            </div>
        </div>  
        <?php endforeach; ?>
    </div>
</div>