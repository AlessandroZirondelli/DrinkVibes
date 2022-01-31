<div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <div class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              <h3>Alcohol</h3>
            </button>
          </div>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <div class="container mt-5 mb-5">
                <div class="row g-1">
                    <?php foreach($templateParams["liquidingredient"] as $liquidingredient): ?>
                        <div class="col-md-4  border border-secondary">
                            <div class="p-card">
                                <div class="flip-card">
                                        <div class="flip-card-front">
                                            <img src="./assets/img/i.png" alt="Avatar" style="width:100%;height:10rem;">
                                        </div>
                                </div>
                                <div class="p-details">
                                    <div class="d-flex justify-content-between align-items-center mx-2">
                                        <h5><?php echo $liquidingredient["name"]; ?></h5>
                                    </div>
                                    <div class="mx-2">
                                        <hr class="line">
                                    </div>
                                    
                                    <div>
                                        <div class="accordion accordion-flush" id="accordionFlush<?php echo $liquidingredient["ingredientID"]; ?>">
                                          <div class="accordion-item">
                                            <div class="accordion-header<?php echo $liquidingredient["ingredientID"]; ?>" id="flush-heading<?php echo $liquidingredient["ingredientID"]; ?>">
                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $liquidingredient["ingredientID"]; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $liquidingredient["ingredientID"]; ?>">
                                                <h4>Dettagli</h4>
                                              </button>
                                            </div>
                                            <div id="flush-collapse<?php echo $liquidingredient["ingredientID"]; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $liquidingredient["ingredientID"]; ?>" data-bs-parent="#accordionFlush<?php echo $liquidingredient["ingredientID"]; ?>">
                                              <div class="accordion-body<?php echo $liquidingredient["ingredientID"]; ?>"><?php echo $liquidingredient["description"]; ?></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="buy mt-3">
                                        
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <button class="btn btn-primary btn-block" type="button">Add</button>
                                            </div>
                                            <div class="form-group col-4">
                                                <input type="text" class="form-control" id="inputAddress" placeholder="Quantity">
                                            </div>
                                            <div class= "col-3 p-0">mL</div>
                                            <div class="col-3"><?php echo $liquidingredient["price"]; ?> euro/L</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
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