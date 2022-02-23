<h1 class="p-3">Make your drink</h1>
<div>
<table class="table table-bordered " id = "ingredientTable">
  <caption>Ingredients choosen</caption>
  <thead>
    <th>Ingredient</th>
    <th>Quantity</th>
    <th>Price</th>
  </thead>
  <tfoot>
    <tr>
      <td>Total</td>
      <td></td>
      <td></td>
      <td><button class="btn btn-dark text-uppercase" onclick="deleteRow()">Remove</button></td>
    </tr>
  </tfoot>
</table>
</div>

<div class="d-flex form-group align-items-center justify-content-between py-3 px-6 col-md-4">
    <input type="text" class="form-control form-rounded" id="qtnShoppingCart" placeholder="Quantity">
    <button class="btn btn-dark text-uppercase col-8" onclick="addShoppingCart()">Add to shopping cart</button>
</div>
<div>
  <p id = "textShoppingCart"></p>
</div>

<div>
<table class="table table-bordered " id = "sessionTable">
 

</table>
</div>

<h2 class="p-3">Choose your ingredients</h2>
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
                    <?php foreach($templateParams[$category] as $ingredient): ?>
                      <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card-inner">
                                <img class="card-img rounded-0" src="assets/img/i.png">       
                            </div>
                            <div class="card-body pb-0 px-2">
                                
                                <div class="h3 text-decoration-none pb-2" id="name<?php echo $ingredient["ingredientID"]; ?>"><?php echo $ingredient["name"]; echo $ingredient["qtystock"] == "0" ? " - Sold out" : ""?></div>
                                
                                <div class="mx-1">
                                  <hr class="line my-0">
                                </div>
                                <div class="accordion accordion-flush" id="accordionFlush<?php echo $ingredient["ingredientID"]; ?>">
                                          <div class="accordion-item">
                                            <div class="accordion-header<?php echo $ingredient["ingredientID"]; ?>" id="flush-heading<?php echo $ingredient["ingredientID"]; ?>">
                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $ingredient["ingredientID"]; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $ingredient["ingredientID"]; ?>">
                                                <h5>Dettagli</h5>
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
                                        <div class="h4"><span>&#8364;</span><?php echo $ingredient["price"]; ?>/<?php echo $ingredient["category"] == "Liquid" ? "mL" : "u";?></div>
                                        <input type="text" class="form-control form-rounded" id="qtn<?php echo $ingredient["ingredientID"]; ?>" <?php echo $ingredient["qtystock"] == "0" ? 'disabled = "disabled";' : ""?> placeholder="Quantity(mL)">
                                        <div> <button class="btn btn-dark text-uppercase" id ="btn<?php echo $ingredient["ingredientID"]; ?>"onclick="submitQuantity(<?php echo $ingredient["ingredientID"]; ?>)" <?php echo $ingredient["qtystock"] == "0" ? 'disabled = "disabled"' : ""?>>Add</button> </div>
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
      <?php endforeach; ?>        
</div>