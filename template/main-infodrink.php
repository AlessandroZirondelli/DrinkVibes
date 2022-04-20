<div class="container mt-4">
    <h1 class="text-center"> Info drink </h1>
    <div class="row">
        <div class="col-2 col-md-3"> </div>
        <div class="col-8 col-md-6">
            <div class="card mb-4 product-wap rounded-0">
                <div class="card-inner">
                    <img class="card-img rounded-0" src="assets/img/mysteryDrink2.png" alt="Mystery customize drink">       
                </div>
                <div class="card-body pb-0 px-2">                          
                    <h2 class="card-title">Ingredients</h2>                              
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach($ingredients as $tmp):?>
                        <li class="list-group-item">
                            <?php echo $tmp->getName()." ".$tmp->getQty();?> 
                            <?php if($tmp->getCategory()=="Liquid"){
                                echo "ml";
                            }else{
                                echo "unit";
                            }
                            ?>   
                        </li>
                    <?php  endforeach;?>
                </ul>
                <div class="mx-1">
                    <hr class="line my-0">
                </div>
            </div>
        </div>
        <div class="col-2 col-md-3"> </div>
    </div>
</div>