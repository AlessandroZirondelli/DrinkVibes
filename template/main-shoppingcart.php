<h2 class="text-center mt-4">Shopping cart</h2>
<section class="h-100 h-custom">

  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">

        <div id="tableproduct" class="table-responsive">

          <table class="table">
            <thead>
              <tr>
                <th scope="col" id="tableProduct" class="h5">Product</th>
                <th scope="col" id="tableQuantity">Quantity</th>
                <th scope="col" id="tablePrice">Price</th>
                <th></th>
              </tr>
            </thead>

            <tbody>

              <?php foreach ($templateParams["hmd"] as $hmd) : ?>
                <tr id="rowDrink<?php echo $hmd[0]->getId(); ?>">
                  <th scope="rowDrink<?php echo $hmd[0]->getId(); ?>">
                    <div class="d-flex align-items-center">
                      <img src="assets/img/MysteryDrink2.png" class="img-fluid rounded-3" style="width: 120px;" alt="Drink">
                      <div class="mx-1">HandMadeDrink<?php echo $hmd[0]->getId(); ?></div>
                    </div>

                  </th>

                  <td class="align-middle">
                    <div class="d-flex flex-row selector">
                      <button class="btn btn-link px-2 down"></button>
                      <input id="formDrink<?php echo $hmd[0]->getId(); ?>" min="1" title="quantity" name="quantity" value="<?php echo $hmd[1]; ?>" type="number" class="form-control form-control-sm change-btn first" style="width: 50px;" />
                      <button class="btn btn-link px-2 up"> </button>
                    </div>
                  </td>
                  <td class="align-middle">
                    <p class="mb-0" style="font-weight: 500;"><?php echo $hmd[0]->getTotalPrice(); ?></p>
                  </td>
                  <td class="align-middle deletebtnDrink">
                    <button id="<?php echo $hmd[0]->getId(); ?> "> <i class="bi bi-trash"></i> </button>
                  </td>

                </tr>

              <?php endforeach; ?>
              <?php foreach ($templateParams["prod"] as $prod) : ?>
                <tr id="rowProd<?php echo $prod[0]->getProductID(); ?>">
                  <th scope="rowProd<?php echo $prod[0]->getProductID(); ?>">
                    <div class="d-flex align-items-center">
                      <img src="<?php echo $prod[0]->getImage(); ?>" class="img-fluid rounded-3" style="width: 120px;" alt="Drink">
                      <div class="mx-1"><?php echo $prod[0]->getName(); ?></div>
                    </div>

                  </th>

                  <td class="align-middle">
                    <div class="d-flex flex-row selector">

                      <button class="btn btn-link px-2 down"></button>
                      <input id="formProd<?php echo $prod[0]->getProductID(); ?>" min="1" title="quantity" name="quantity" value="<?php echo $prod[1]; ?>" type="number" class="form-control form-control-sm change-btn second" style="width: 50px;" />
                      <button class="btn btn-link px-2 up"></button>

                    </div>
                  </td>
                  <td class="align-middle">
                    <p class="mb-0" style="font-weight: 500;"><?php echo $prod[0]->getPrice(); ?></p>
                  </td>
                  <td class="align-middle deletebtnProduct">
                    <button id="<?php echo $prod[0]->getProductID(); ?>"> <i class="bi bi-trash"></i> </button>
                  </td>

                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div id="cardempty" class="card-body cart">
          <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" alt="cart" width="130" height="130" class="img-fluid mb-4 mr-3">
            <h3><strong>Your Cart is Empty</strong></h3>
            <h4>Add something to make me happy :)</h4> <a href="index.php" class="btn btn-dark text-uppercase " data-abc="true">continue shopping</a>
          </div>
        </div>
        <div id="paycard" class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
          <div class="card-body p-4">

            <div class="row">
              <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mb-md-0">

                <form>
                  <fieldset>
                    <div class="d-flex flex-row pb-3">
                      <div class="d-flex align-items-center pe-2">
                        <input class="form-check-input" type="radio" title="radioNoLabel" name="radioNoLabel" id="radioNoLabel1v" value="" aria-label="..." checked />
                      </div>
                      <div class="rounded border w-100 p-3">
                        <p class="d-flex align-items-center mb-0">
                          <i class="fab fa-cc-mastercard fa-2x text-dark pe-2"></i>
                          Card
                        </p>
                      </div>
                    </div>
                    <div class="d-flex flex-row pb-3">
                      <div class="d-flex align-items-center pe-2">
                        <input class="form-check-input" title="radioNoLabel" type="radio" name="radioNoLabel" id="radioNoLabel2v" value="" aria-label="..." />
                      </div>
                      <div class="rounded border w-100 p-3">
                        <p class="d-flex align-items-center mb-0">
                          <i class="fab fa-cc-visa fa-2x fa-lg text-dark pe-2"></i>Debit Card
                        </p>
                      </div>
                    </div>
                    <div class="d-flex flex-row">
                      <div class="d-flex align-items-center pe-2">
                        <input class="form-check-input" title="radioNoLabel" type="radio" name="radioNoLabel" id="radioNoLabel3v" value="" aria-label="..." />
                      </div>
                      <div class="rounded border w-100 p-3">
                        <p class="d-flex align-items-center mb-0">
                          <i class="fab fa-cc-paypal fa-2x fa-lg text-dark pe-2"></i>PayPal
                        </p>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
              <div class="col-md-6 col-lg-4 col-xl-6">
                <div class="row">
                  <div class="col-12 col-xl-6">
                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" title="typeName" id="typeName" class="form-control form-control-lg" size="17" placeholder="John Smith" />
                      <label class="form-label" for="typeName">Name on card</label>
                    </div>

                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" title="typeExp" id="typeExp" class="form-control form-control-lg" placeholder="MM/YY" size="7" id="exp" minlength="7" maxlength="7" />
                      <label class="form-label" for="typeExp">Expiration</label>
                    </div>
                  </div>
                  <div class="col-12 col-xl-6">
                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" title="typeText1" id="typeText1" class="form-control form-control-lg" size="17" placeholder="1111 2222 3333 4444" minlength="19" maxlength="19" />
                      <label class="form-label" for="typeText1">Card Number</label>
                    </div>

                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="password" title="typeText" id="typeText" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                      <label class="form-label" for="typeText">Cvv</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-2">Subtotal</p>
                  <div class="mb-2"><span>&#8364;</span><span id="subtotal">3</span></div>
                </div>

                <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-0">Shipping</p>
                  <div class="mb-0"><span>&#8364;</span><span id="ship">2.99</span></div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                  <p class="mb-2">Total (tax included)</p>
                  <div id="total" class="mb-2"><span>&#8364;</span><span id="totale">302.99</span></div>
                </div>
                <!-- 
                <button type="button" class="btn btn-primary btn-block btn-lg" onclick=buyProduct()>
                  <div class="d-flex justify-content-between">
                    <span>Checkout</span>

                  </div>
                </button>
                -->
                <form action="../DrinkVibes/utils/sendOrder.php" method="GET">
                  <input type="submit" title="value" value="Submit" name="insertButton">
                </form>

              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>