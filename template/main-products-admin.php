<h1 class="p-3">Shop Products</h1>

<div class="container mb-5 p-0">

  <div>
    <!-- è la pagina per la card del nuovo prodotto-->
    <a href="./insertProduct.php" class="btn btn-dark col-12 mx-2">Add new product</a>
  </div>


  <div class="row">
    <h2 class="p-3">Modify existing products</h2>
    <?php foreach ($templateParams["All"] as $products) : ?>
      <div class="col-md-4" id="card<?php echo $products["productID"]; ?>">
        <div class="card mb-4 product-wap rounded-0">
          <div class="card-inner">
            <img class="card-img rounded-0" alt="img default" src="<?php echo $products["imageURL"]; ?>">

          </div>
          <div class="card-body pb-0 px-2">
            <div class="text-decoration-none pb-2" id="name<?php echo $products["productID"]; ?>"><?php echo $products["name"]; ?></div>

            <div class="mx-1">
              <hr class="line my-0">
            </div>
            <div class="accordion accordion-flush" id="accordionFlush<?php echo $products["productID"]; ?>">
              <div class="accordion-item">
                <div class="accordion-header<?php echo $products["productID"]; ?>" id="flush-heading<?php echo $products["productID"]; ?>">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $products["productID"]; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $products["productID"]; ?>">
                    <div class="text-decoration-none">Details</div>
                  </button>
                </div>
                <div id="flush-collapse<?php echo $products["productID"]; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $products["productID"]; ?>" data-bs-parent="#accordionFlush<?php echo $products["productID"]; ?>">
                  <div class="accordion-body<?php echo $products["productID"]; ?>">Description:<br><?php echo $products["description"]; ?></div>
                </div>
              </div>
            </div>
            <div class="mx-1">
              <hr class="line my-0">
            </div>
            <div class="d-flex align-items-center justify-content-between py-3 px-6">
              <div>
                <label>Prezzo:</label>
                <div class="h4"><span>&#8364;</span><?php echo $products["price"]; ?>/pz</div>
              </div>
              <div>

                <form class="form-inline">
                  <label for="rg-from">Quantity: </label>
                  <div class="form-group me-1">
                    <input class="form-control form-rounded" title="input" type="text" id="qtn<?php echo $products["productID"]; ?>" name="rg-from" value="<?php echo  $products["qtystock"] ?>">
                  </div>

                </form>
              </div>


            </div>
            <div class="mx-1">
              <hr class="line my-0">
            </div>
            <div class="mb-2 mt-2 selection-option">

              <button class="btn btn-success text-uppercase " id="savebtn<?php echo $products["productID"]; ?>">Save</button> 
              <button class="btn btn-danger text-uppercase " id="deletebtn<?php echo $products["productID"]; ?>">Delete</button> 

            </div>

            <div id="warningsLabel<?php echo $products["productID"]; ?>"></div>
          </div>
        </div>
      </div>

    <?php endforeach; ?>

  </div>