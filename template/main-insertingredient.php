<h1 class="m-3">Insert your ingredient</h1>
    <div class="container d-flex justify-content-center">
                            <div class="card col-md-6 mb-2 product-wap rounded-0 d-flex justify-content-center">
                                <div class="card-inner">
                                    <img id = "imgIngredient" class="card-img rounded-0" src="assets/img/i.png" alt = "photo ingredient">       
                                </div>
                                <div class="card-body pb-0 pt-0 ps-0 mx-2">
                                  <form action = "uploadImageIngredient.php" id="formId" method = 'POST' enctype="multipart/form-data">
                                      <div class="text-decoration-none mb-3 mt-3" id="nameDiv">
                                          <label for="name">Name:</label>
                                          <input class="form-control form-rounded " name="name" type="text"  id="name" placeholder="Name" value ="">
                                      </div>
                                      
                                      <div class="mx-1">
                                        <hr class="line my-0">
                                      </div>

                                      <div class="image-upload mb-3 mt-3">
                                        <label for="image">Ingredient's Image:</label>
                                        <input type="file" id="image" name="imageToSave" accept="image/png , image/jpeg" value="assets/img/i.png" />
                                      </div>

                                      <div class="mx-1">
                                        <hr class="line my-0">
                                      </div>

                                      <div class="form-group mb-3 mt-3">
                                        <label for="textArea">Description:</label>
                                        <textarea class="form-control form-rounded" id="textArea" rows="3"></textarea>
                                      </div>
                                      
                                      <div class="mx-1">
                                        <hr class="line my-0">
                                      </div>
                                      
                                      <div class="mb-3 mt-3">
                                        <label  for="qtn">Quantity:</label>
                                        <input  name="qtn" type="text" class="form-control form-rounded" id="qtn" placeholder="Quantity">
                                      </div>        

                                      <div class="mx-1">
                                        <hr class="line my-0">
                                      </div>

                                      
                                      <div id="category" class="mb-3 mt-3">
                                            <label >Category:</label>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radioButtonUnit" name="optradiocategory" value="Unit" onclick='changeRadioButtonCategory("Unit")'  checked>
                                                <label class="form-check-label" for="radioButtonUnit">Unit</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radioButtonLiquid" name="optradiocategory" value="Liquid" onclick='changeRadioButtonCategory("Liquid")'>
                                                <label class="form-check-label" for="radioButtonLiquid">Liquid(mL)</label>
                                            </div>
                                      </div>
                                      <div id="tipology" class="mb-3 mt-3">
                                        <label >Tipology:</label>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radioButtonSpirit" name="optradiotipology" value="Spirit" onclick='changeRadioButtonTipology("Spirit")'  checked>
                                                <label class="form-check-label" for="radioButtonSpirit">Spirit</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radioButtonWine" name="optradiotipology" value="Wine" onclick='changeRadioButtonTipology("Wine")'>
                                                <label class="form-check-label" for="radioButtonWine">Wine</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radioButtonBeverage" name="optradiotipology" value="Beverage" onclick='changeRadioButtonTipology("Beverage")'>
                                                <label class="form-check-label" for="radioButtonBeverage">Beverage</label>
                                            </div>
                                      </div>

                                    

                                      <div class="mx-1">
                                        <hr class="line my-0">
                                      </div>

                                        
                                      
                                      <div class="mb-3 mt-3">
                                        <label  for="price">Price:</label>
                                        <input name="price" type="text" class="form-control form-rounded" id="price" placeholder="Price">
                                      </div>  
                                      
                                      <div class="mx-1">
                                        <hr class="line my-0">
                                      </div>
                                      
                                      <div> 
                                          <button  id="insert" name="insert" value="Insert" class="btn btn-dark text-uppercase mb-3 mt-3" >Add</button> 
                                      </div>
                                      <div id = "warningsLabel"></div>
                                    </form>
                                </div>
                            </div>
                        </div>  


