
<h1 class="p-3" id = "hint">Make your drink</h1>
<table>
  <caption>Ingredients choosen</caption>
  <thead>
    <th>Ingredient</th>
    <th>Quantity</th>
    <th>Price</th>
  </thead>

  <tbody>
  </tbody>
</table>
<h2 class="p-3">Choose your ingredients</h2>
<div class="accordion accordion-flush px-3 pb-3" id="accordionFlushExample">
        <div class="accordion-item">
          <div class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed p-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              <h3>Alcohol</h3>
            </button>
          </div>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body ">
              <div class="container mt-5 mb-5 p-0">
                <div class="row g-1">
                    <?php foreach($templateParams["liquidingredient"] as $liquidingredient): ?>
                      <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card-inner">
                                <img class="card-img rounded-0" src="assets/img/i.png">       
                            </div>
                            <div class="card-body pb-0">
                                <p class="h3 text-decoration-none pb-3"><?php echo $liquidingredient["name"]; ?></a>
                                <div class="mx-1">
                                  <hr class="line my-0">
                                </div>
                                <div class="accordion accordion-flush" id="accordionFlush<?php echo $liquidingredient["ingredientID"]; ?>">
                                          <div class="accordion-item">
                                            <div class="accordion-header<?php echo $liquidingredient["ingredientID"]; ?>" id="flush-heading<?php echo $liquidingredient["ingredientID"]; ?>">
                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $liquidingredient["ingredientID"]; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $liquidingredient["ingredientID"]; ?>">
                                                <h5>Dettagli</h5>
                                              </button>
                                            </div>
                                            <div id="flush-collapse<?php echo $liquidingredient["ingredientID"]; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $liquidingredient["ingredientID"]; ?>" data-bs-parent="#accordionFlush<?php echo $liquidingredient["ingredientID"]; ?>">
                                              <div class="accordion-body<?php echo $liquidingredient["ingredientID"]; ?>"><?php echo $liquidingredient["description"]; ?></div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="mx-1">
                                          <hr class="line my-0">
                                        </div>
                                    <div class="d-flex align-items-center justify-content-between py-3 px-6">
                                        <div class="h4"><span>&#8364;</span><?php echo $liquidingredient["price"]; ?>/L</div>
                                        <input type="text" class="form-control form-rounded" id="qtn<?php echo $liquidingredient["ingredientID"]; ?>" placeholder="Quantity">
                                        <div> <button class="btn btn-dark text-uppercase" onclick="submitQuantity(<?php echo $liquidingredient["ingredientID"]; ?>)" >Add</button> </div>
                                    </div>
                                    
                            </div>
                        </div>
                      </div>  
                    <?php endforeach; ?>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card-inner">
                                <img class="card-img rounded-0" src="assets/img/spirits-icon.PNG">
                                
                            </div>
                            <div class="card-body">
                                <p class="h3 text-decoration-none"><?php echo $liquidingredient["name"]; ?></a>
                                <div class="accordion accordion-flush" id="accordionFlush<?php echo $liquidingredient["ingredientID"]; ?>">
                                          <div class="accordion-item">
                                            <div class="accordion-header<?php echo $liquidingredient["ingredientID"]; ?>" id="flush-heading<?php echo $liquidingredient["ingredientID"]; ?>">
                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $liquidingredient["ingredientID"]; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $liquidingredient["ingredientID"]; ?>">
                                                <h5>Dettagli</h5>
                                              </button>
                                            </div>
                                            <div id="flush-collapse<?php echo $liquidingredient["ingredientID"]; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $liquidingredient["ingredientID"]; ?>" data-bs-parent="#accordionFlush<?php echo $liquidingredient["ingredientID"]; ?>">
                                              <div class="accordion-body<?php echo $liquidingredient["ingredientID"]; ?>"><?php echo $liquidingredient["description"]; ?></div>
                                            </div>
                                          </div>
                                        </div>
                                    <div class="d-flex align-items-center justify-content-between py-1 px-6">
                                        <div class="h4"><span>&#8364;</span><?php echo $liquidingredient["price"]; ?></div>
                                        <div> <button class="btn btn-dark text-uppercase">Add</button> </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <div class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              <h3>Decoration</h3>
            </button>
          </divh2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <div class="card-body">
                <div  class="d-flex">
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div  class="d-flex">
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <div class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              <h3>Juice</h3>
            </button>
          </div>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
          </div>
        </div>
      </div>