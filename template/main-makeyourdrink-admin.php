<h1 class="p-3">Make your drink</h1>
<div class="col-md-4 px-3">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card-inner">
                                    <img id = "imgIngredient" class="card-img rounded-0" src="assets/img/i.png" alt = "photo ingredient">       
                                </div>
                                <div class="card-body pb-0 px-2">
                                    
                                    <div class="text-decoration-none pb-2 mr-4" id="nameDiv">
                                        <label for="name">Name:</label>
                                        <input class="form-control form-rounded mr-3" name="name" type="text"  id="name" placeholder="Name">
                                    </div>
                                    
                                    <div class="mx-1">
                                      <hr class="line my-0">
                                    </div>

                                    <div class="image-upload pb-2">
                                      <label for="Image">Ingredient's Image:</label>
                                      <input type="file" id="Image" name="imageToSave" accept="image/png , image/jpeg" value="" />
                                    </div>

                                    <div class="mx-1">
                                      <hr class="line my-0">
                                    </div>

                                    <div class="form-group pb-2">
                                      <label for="exampleFormControlTextarea1">Description:</label>
                                      <textarea class="form-control form-rounded" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    
                                    <div class="mx-1">
                                      <hr class="line my-0">
                                    </div>
                                    
                                    <div class="pb-2">
                                      <label  for="qtn">Quantity</label>
                                      <input  name="qtn" type="text" class="form-control form-rounded" id="qtn" placeholder="Quantity()">
                                    </div>        

                                    <div class="mx-1">
                                      <hr class="line my-0">
                                    </div>
                                    
                                    <div class="pb-2">
                                      <label  for="price">Price</label>
                                      <input name="price" type="text" class="form-control form-rounded" id="price" placeholder="Quantity()">
                                    </div>  
                                    
                                    
                                    <div> <button class="btn btn-dark text-uppercase " id ="btn" onclick="addIngredient()">Add</button> </div>

                                </div>
                            </div>
                        </div>  
                    
<h2 class="p-3">Modify your ingredients</h2>
<div class="accordion accordion-flush px-3 pb-3" id="accordionFlushExample">
      <?php foreach($templateParams["categories"] as $category): ?>
        <div class="accordion-item">
          <div class="accordion-header" id="flush-heading<?php echo $category ?>">
            <button class="accordion-button collapsed p-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $category ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $category ?>">
              <h3><?php echo $category ?></h3>
            </button>
          </div>
          <div id="flush-collapse<?php echo $category ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $category ?>" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body ">
              <div class="container mt-5 mb-5 p-0">
                <div class="row g-1">
                    <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card-inner">
                                    <img class="card-img rounded-0" src="assets/img/i.png" alt = "photo ingredient">       
                                </div>
                                <div class="card-body pb-0 px-2">
                                    
                                    <div class="text-decoration-none pb-2 mr-4" id="name<?php echo $category; ?>">
                                        <label for="qtn<?php echo $category; ?>">Name:</label>
                                        <input class="form-control form-rounded mr-3" name="qtn<?php echo $category; ?>" type="text"  id="qtn<?php echo $category; ?>" placeholder="Name">
                                
                                    </div>
                                    
                                    <div class="mx-1">
                                    <hr class="line my-0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Example textarea</label>
                                            <textarea class="form-control form-rounded" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    <div class="mx-1">
                                            <hr class="line my-0">
                                    </div>
                                        <div>
                                            <label  for="qtn<?php echo $category; ?>">Quantity</label>
                                            <input  name="qtn<?php echo $category; ?>" type="text" class="form-control form-rounded" id="qtn<?php echo $category; ?>" placeholder="Quantity()">
                                        </div>        
                                        
                                    
                                        <div class="mx-1">
                                            <hr class="line my-0">
                                         </div>
                                         <div>
                                            <label  for="price<?php echo $category; ?>">Price</label>
                                            <input name="price<?php echo $category; ?>" type="text" class="form-control form-rounded" id="price<?php echo $category; ?>" placeholder="Quantity()">
                                        </div>  
                                         <div> <button class="btn btn-dark text-uppercase " id ="btn<?php echo $category; ?>"onclick="">Add</button> </div>

                                </div>
                            </div>
                        </div>  
                    <?php foreach($templateParams[$category] as $ingredient): ?>
                      <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card-inner">
                                <img class="card-img rounded-0" src="assets/img/i.png" alt = "photo ingredient">       
                            </div>
                            <div class="card-body pb-0 px-2">
                                
                                <div class="text-decoration-none pb-2" id="name<?php echo $ingredient["ingredientID"]; ?>"><?php echo $ingredient["name"]; echo $ingredient["qtystock"] == "0" ? " - Sold out" : ""?></div>
                                
                                <div class="mx-1">
                                  <hr class="line my-0">
                                </div>
                                <div class="accordion accordion-flush" id="accordionFlush<?php echo $ingredient["ingredientID"]; ?>">
                                          <div class="accordion-item">
                                            <div class="accordion-header<?php echo $ingredient["ingredientID"]; ?>" id="flush-heading<?php echo $ingredient["ingredientID"]; ?>">
                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $ingredient["ingredientID"]; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $ingredient["ingredientID"]; ?>">
                                              <div class="text-decoration-none">Dettagli </div>
                                              </button>
                                            </div>
                                            <div id="flush-collapse<?php echo $ingredient["ingredientID"]; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $ingredient["ingredientID"]; ?>" data-bs-parent="#accordionFlush<?php echo $ingredient["ingredientID"]; ?>">
                                              <div class="accordion-body<?php echo $ingredient["ingredientID"]; ?>">Descrizione:<br><?php echo $ingredient["description"]; ?><br>Quantità totale: <?php echo $ingredient["category"] == "Liquid" ? $ingredient["qtystock"] . " mL" : $ingredient["qtystock"] . " unity";?></div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="mx-1">
                                          <hr class="line my-0">
                                        </div>
                                    <div class="d-flex align-items-center justify-content-between py-3 px-6">
                                        
                                          
                                          <div class="" style=""><span>&#8364;</span><?php echo $ingredient["price"]; ?>/<?php echo $ingredient["category"] == "Liquid" ? "mL" : "u";?></div>
                                        
                                        <div>
                                          <label class="d-inline" for="qtn<?php echo $ingredient["ingredientID"]; ?>">Q</label>
                                          <div class="d-flex flex-row">
                            
                                            <button class="btn btn-link px-2 "
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                            <i class="fas fa-minus"></i>
                                            </button>

                                            <input class="d-inline" id = "qtn<?php echo $ingredient["ingredientID"]; ?>"   min="1" name="quantity" value="1" type="number"
                                            class="form-control form-control-sm " style="width: 50px;" onChange="check_qty(this.value,1);" />

                                            <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                            <i class="fas fa-plus"></i>
                                            </button>
                            
                           
                                            </div>
                                        </div>
                                        
                                          <div> <button class="btn btn-dark text-uppercase" id ="btn<?php echo $ingredient["ingredientID"]; ?>"onclick="submitQuantity(<?php echo $ingredient["ingredientID"]; ?>)" <?php echo $ingredient["qtystock"] == "0" ? 'disabled = "disabled"' : ""?>>Add</button> </div>
                                        
                                    </div>
                                    <div id = "warningsLabel<?php echo $ingredient["ingredientID"]; ?>"></div>
                            </div>
                        </div>
                      </div>  
                    <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>        
</div>