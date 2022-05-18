<h1 class="m-3">Make your drink</h1>
<div>
  <a href="./insertIngredient.php" class="btn btn-dark text-uppercase col-6 mx-1">
    Add ingredient
  </a>
</div>
<h2 class="p-3">Modify your ingredients</h2>
<div class="accordion accordion-flush px-3 pb-3" id="accordionFlushExample">

  <?php foreach ($templateParams["categories"] as $category) : ?>
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
              <?php foreach ($templateParams[$category] as $ingredient) : ?>
                <div class="col-md-4" id="card<?php echo $ingredient["ingredientID"]; ?>">
                  <div class="card mb-4 product-wap rounded-0">
                    <div class="card-inner">
                      <img class="card-img rounded-0" src="<?php echo $ingredient["imageURL"]; ?>" alt="photo ingredient">
                    </div>
                    <div class="card-body pb-0 px-2">

                      <div class="text-decoration-none pb-2" id="name<?php echo $ingredient["ingredientID"]; ?>"><?php echo $ingredient["name"]; ?></div>

                      <div class="mx-1">
                        <hr class="line my-0">
                      </div>
                      <div class="accordion accordion-flush" id="accordionFlush<?php echo $ingredient["ingredientID"]; ?>">
                        <div class="accordion-item">
                          <div class="accordion-header<?php echo $ingredient["ingredientID"]; ?>" id="flush-heading<?php echo $ingredient["ingredientID"]; ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $ingredient["ingredientID"]; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $ingredient["ingredientID"]; ?>">
                              <div class="text-decoration-none">Details </div>
                            </button>
                          </div>
                          <div id="flush-collapse<?php echo $ingredient["ingredientID"]; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $ingredient["ingredientID"]; ?>" data-bs-parent="#accordionFlush<?php echo $ingredient["ingredientID"]; ?>">
                            <div class="accordion-body<?php echo $ingredient["ingredientID"]; ?>">Description:<br><?php echo $ingredient["description"]; ?></div>
                          </div>
                        </div>
                      </div>
                      <div class="mx-1">
                        <hr class="line my-0">
                      </div>
                      <div class="d-flex align-items-center justify-content-between py-3 px-6">
                        <div>
                          <label>Prezzo:</label>
                          <div class="" style=""><span>&#8364;</span><?php echo $ingredient["price"]; ?>/<?php echo $ingredient["category"] == "Liquid" ? "mL" : "u"; ?></div>
                        </div>
                        <div>

                          <form class="form-inline">
                            <label for="rg-from">Quantity: </label>
                            <div class="form-group me-1">
                              <input class="form-control form-rounded" type="text" id="qtn<?php echo $ingredient["ingredientID"]; ?>" name="rg-from" value="<?php echo  $ingredient["qtystock"]; ?>">
                            </div>

                          </form>
                        </div>


                      </div>
                      <div class="mx-1">
                        <hr class="line my-0">
                      </div>
                      <div class="mb-2 mt-2 selection-option">
                        <button class="btn btn-dark text-uppercase " id="savebtn<?php echo $ingredient["ingredientID"]; ?>" >Save</button>
                        <button class="btn btn-dark text-uppercase " id="deletebtn<?php echo $ingredient["ingredientID"]; ?>" >Delete</button>

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