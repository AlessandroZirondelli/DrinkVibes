

<section class="h-100 h-custom">

  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">

        <div class="table-responsive">
          
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="h5">Shopping Bag</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th></th>
              </tr>
            </thead>
            
            <tbody>
            
                <?php foreach($templateParams["hmd"] as $hmd): ?>
                    <tr id = "row<?php echo $hmd[0] ->getId();?>">
                        <th scope="row<?php echo $hmd[0] ->getId();?>">
                        <div class="d-flex align-items-center">
                            <img src="assets/img/i.png" class="img-fluid rounded-3" style="width: 120px;" alt="Drink">
                        </div>
                        </th>
                        
                        <td class="align-middle">
                        <div class="d-flex flex-row">
                            
                            <button class="btn btn-link px-2 "
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="fas fa-minus"></i>
                            </button>

                            <input id="form<?php echo $hmd[0] ->getId();?>" min="1" name="quantity" value="<?php echo $hmd[1];?>" type="number"
                            class="form-control form-control-sm" style="width: 50px;" onChange="check_qty(this.value,<?php echo $hmd[0]->getId();?>);" />

                            <button class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <i class="fas fa-plus"></i>
                            </button>
                            
                           
                        </div>
                        </td>
                        <td class="align-middle">
                        <p class="mb-0" style="font-weight: 500;"><?php echo $hmd[0]->getTotalPrice(); ?></p>
                        </td>
                        <td  class="align-middle">
                            <button onclick="deleteDrink(<?php echo $hmd[0] ->getId();?>)" > <i class="bi bi-trash"></i> </button>
                        </td>
                        
                    </tr>
                   
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
          <div class="card-body p-4">

            <div class="row">
              <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mb-md-0">

                <form>
                  <div class="d-flex flex-row pb-3">
                    <div class="d-flex align-items-center pe-2">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="radioNoLabel"
                        id="radioNoLabel1v"
                        value=""
                        aria-label="..."
                        checked
                      />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                        <i class="fab fa-cc-mastercard fa-2x text-dark pe-2"></i>Credit
                        Card
                      </p>
                    </div>
                  </div>
                  <div class="d-flex flex-row pb-3">
                    <div class="d-flex align-items-center pe-2">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="radioNoLabel"
                        id="radioNoLabel2v"
                        value=""
                        aria-label="..."
                      />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                        <i class="fab fa-cc-visa fa-2x fa-lg text-dark pe-2"></i>Debit Card
                      </p>
                    </div>
                  </div>
                  <div class="d-flex flex-row">
                    <div class="d-flex align-items-center pe-2">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="radioNoLabel"
                        id="radioNoLabel3v"
                        value=""
                        aria-label="..."
                      />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                        <i class="fab fa-cc-paypal fa-2x fa-lg text-dark pe-2"></i>PayPal
                      </p>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-6 col-lg-4 col-xl-6">
                <div class="row">
                  <div class="col-12 col-xl-6">
                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                        placeholder="John Smith" />
                      <label class="form-label" for="typeName">Name on card</label>
                    </div>

                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YY"
                        size="7" id="exp" minlength="7" maxlength="7" />
                      <label class="form-label" for="typeExp">Expiration</label>
                    </div>
                  </div>
                  <div class="col-12 col-xl-6">
                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" id="typeText1" class="form-control form-control-lg" siez="17"
                        placeholder="1111 2222 3333 4444" minlength="19" maxlength="19" />
                      <label class="form-label" for="typeText1">Card Number</label>
                    </div>

                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="password" id="typeText" class="form-control form-control-lg"
                        placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                      <label class="form-label" for="typeText">Cvv</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-2">Subtotal</p>
                  <div class="mb-2"><span>&#8364;</span><span  id = "subtotal">3</span></div>
                </div>

                <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-0">Shipping</p>
                  <div class="mb-0"><span>&#8364;</span><span  id = "ship">2.99</span></div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                  <p class="mb-2">Total (tax included)</p>
                  <div id = "total"class="mb-2"><span>&#8364;</span><span  id = "total">302.99</span></div>
                </div>

                <button type="button" class="btn btn-primary btn-block btn-lg" onclick=buyProduct()>
                  <div class="d-flex justify-content-between">
                    <span>Checkout</span>

                  </div>
                </button>

              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>
