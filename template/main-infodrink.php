<div class="container">
    <div class="row">
        <div class="col-2 col-md-3"> </div>
        <div class="col-8 col-md-6">
            <div class="card mb-4 product-wap rounded-0">
                <div class="card-inner">
                    <img class="card-img rounded-0" src="assets/img/i.png">       
                </div>
                <div class="card-body pb-0 px-2">                          
                    <h5 class="card-title">Ingredients</h5>                              
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach($ingredients as $tmp):?>
                        <li class="list-group-item"><?php echo $tmp->getName()." ".$tmp->getQty();?></li>
                    <?php  endforeach;?>
                </ul>
                <div class="mx-1">
                    <hr class="line my-0">
                </div>
            </div>
        </div>
        <div class="col-2 col-md-3"> </div>
    </div>
    <!--
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>
-->
    
</div>