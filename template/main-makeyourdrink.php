<h1 class="m-3">Make your drink</h1>
<div class="mx-5 mb-1  py-3">
  <table class="table table-bordered " id="ingredientTable">
    <caption>Ingredients choosen</caption>
    <thead>
      <tr>
        <th>Ingredient</th>
        <th>Quantity</th>
        <th>Price</th>
        <th></th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td>Total</td>
        <td></td>
        <td></td>
        <td><button id="deleteRowBtn" class="btn btn-dark text-uppercase">Remove</button></td>
      </tr>
    </tfoot>
  </table>
</div>
<div class="pl-4">
  <div class="d-flex form-group align-items-center justify-content-between py-3 px-6 col-md-6">
    <div class="ms-1 px-4">
      <label class="ms-3" for="qtnShoppingCart">Quantity drink handmade:</label>
      <input name="qtnShoppingCart" type="text" class="form-control form-rounded ms-3" id="qtnShoppingCart" placeholder="Quantity">
    </div>
    <button id="addShoppingCartBtn" class="btn btn-dark text-uppercase col-6 mx-1 mt-4">Add to shopping cart</button>
    <button id="resetBtn" class="btn btn-dark text-uppercase col-auto mx-1 mt-4">Reset</button>
  </div>

</div>
<div>
  <p class="ms-3" id="textShoppingCart"></p>
</div>

<div>
  <table class="table table-bordered " id="sessionTable">


  </table>
</div>

<h2 class="p-3">Choose your ingredients</h2>
<div class="accordion accordion-flush px-3 mx-5 pb-3" id="accordionFlushExample">
  <?php foreach ($templateParams["categories"] as $category) : ?>
    <div class="accordion-item">
      <div class="accordion-header" id="flush-heading<?php echo $category ?>">
        <button class="accordion-button collapsed p-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $category ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $category ?>">
          <?php echo $category ?>
        </button>
      </div>
      <div id="flush-collapse<?php echo $category ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $category ?>" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body ">
          <div class="container mt-5 mb-5 p-0">
            <div class="row g-1">
              <?php foreach ($templateParams[$category] as $ingredient) : ?>
                <div class="col-md-4">
                  <div class="card mb-4 product-wap rounded-0">
                    <div class="card-inner">
                      <img class="card-img rounded-0" src="<?php echo $ingredient["imageURL"]; ?>" alt="photo ingredient">
                    </div>
                    <div class="card-body pb-0 px-2">

                      <div class="text-decoration-none pb-2" id="name<?php echo $ingredient["ingredientID"]; ?>"><?php echo $ingredient["name"];
                                                                                                                  echo $ingredient["qtystock"] == "0" ? " - Sold out" : "" ?></div>

                      <div class="mx-1">
                        <hr class="line my-0">
                      </div>
                      <div class="accordion accordion-flush" id="accordionFlush<?php echo $ingredient["ingredientID"]; ?>">
                        <div class="accordion-item">
                          <div class="accordion-header<?php echo $ingredient["ingredientID"]; ?>" id="flush-heading<?php echo $ingredient["ingredientID"]; ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $ingredient["ingredientID"]; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $ingredient["ingredientID"]; ?>">
                              Details
                            </button>
                          </div>
                          <div id="flush-collapse<?php echo $ingredient["ingredientID"]; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $ingredient["ingredientID"]; ?>" data-bs-parent="#accordionFlush<?php echo $ingredient["ingredientID"]; ?>">
                            <div class="accordion-body<?php echo $ingredient["ingredientID"]; ?>">Description:<br><?php echo $ingredient["description"]; ?><br>Total quantity: <div class="d-inline-block" id="qtnDescription<?php echo $ingredient["ingredientID"]; ?>"> <?php echo $ingredient["qtystock"]; ?></div>
                              <div class="d-inline-block"> <?php echo $ingredient["category"] == "Liquid" ? " mL" : " unity"; ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="mx-1">
                        <hr class="line my-0">
                      </div>
                      <div class="d-flex align-items-center justify-content-between py-3 px-6">


                        <div class="" style=""><span>&#8364;</span><?php echo $ingredient["price"]; ?>/<?php echo $ingredient["category"] == "Liquid" ? "mL" : "u"; ?></div>

                        <div>
                          <label class="visually-hidden" for="qtn<?php echo $ingredient["ingredientID"]; ?>">Quantity</label>
                          <input name="qtn<?php echo $ingredient["ingredientID"]; ?>" type="text" class="form-control form-rounded" id="qtn<?php echo $ingredient["ingredientID"]; ?>" <?php echo $ingredient["qtystock"] == "0" ? 'disabled = "disabled";' : "" ?> placeholder="Quantity(<?php echo $ingredient["category"] == "Liquid" ? "mL" : "unity"; ?>)">
                        </div>

                        <div> <button class="btn btn-dark text-uppercase add-button" id="btn<?php echo $ingredient["ingredientID"]; ?>" <?php echo $ingredient["qtystock"] == "0" ? 'disabled = "disabled"' : "" ?>>Add</button> </div>

                      </div>
                      <div id="warningsLabel<?php echo $ingredient["ingredientID"]; ?>"></div>
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