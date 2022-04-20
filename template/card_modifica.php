<div class="card-body pb-0 px-2">
                                
                                <div class="text-decoration-none pb-2" id="name<?php echo $ingredient["ingredientID"]; ?>"><?php echo $ingredient["name"]; ?></div>
                                
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
                                              <div class="accordion-body<?php echo $ingredient["ingredientID"]; ?>">Descrizione:<br><?php echo $ingredient["description"]; ?></div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="mx-1">
                                          <hr class="line my-0">
                                        </div>
                                    <div class="d-flex align-items-center justify-content-between py-3 px-6">
                                        <div>
                                          <label>Prezzo:</label>
                                          <div class="" style=""><span>&#8364;</span><?php echo $ingredient["price"]; ?>/<?php echo $ingredient["category"] == "Liquid" ? "mL" : "u";?></div>
                                        </div>
                                        <div>

                                        <form class="form-inline">
                                          <label for="rg-from">Quantity: </label>
                                          <div class="form-group me-1">
                                            <input class="form-control form-rounded" type="text" id="rg-from" name="rg-from" value="<?php echo  $ingredient["qtystock"]?>" >
                                          </div>
                                          
                                        </form>
                                        </div>
                                        
                  
                                    </div>
                                    <div class="mx-1">
                                      <hr class="line my-0">
                                    </div>
                                    <div class= "mb-2 mt-2"> 
                                      <button class="btn btn-dark text-uppercase " id ="savebtn<?php echo $ingredient["ingredientID"]; ?>"onclick="">Save</button> 
                                      <button class="btn btn-dark text-uppercase " id ="deletebtn<?php echo $ingredient["ingredientID"]; ?>"onclick="">Delete</button> 

                                    </div>

                                    <div id = "warningsLabel<?php echo $ingredient["ingredientID"]; ?>"></div>
</div>