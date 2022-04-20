
<div class="col-md-4 ms-3">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card-inner">
                                    <img id = "imgIngredient" class="card-img rounded-0" src="assets/img/i.png" alt = "photo ingredient">       
                                </div>
                                <div class="card-body pb-0 pt-0 ps-0 mx-2">
                                    <form action = "uploadImageIngredient.php" method = 'POST' enctype="multipart/form-data">
                                      <div class="text-decoration-none mb-3 mt-3" id="nameDiv">
                                          <label for="name">Name:</label>
                                          <input class="form-control form-rounded " name="name" type="text"  id="name" placeholder="Name">
                                      </div>
                                      
                                      <div class="mx-1">
                                        <hr class="line my-0">
                                      </div>

                                      <div class="image-upload mb-3 mt-3">
                                        <label for="Image">Ingredient's Image:</label>
                                        <input type="file" id="Image" name="imageToSave" accept="image/png , image/jpeg" value="" />
                                      </div>

                                      <div class="mx-1">
                                        <hr class="line my-0">
                                      </div>

                                      <div class="form-group mb-3 mt-3">
                                        <label for="exampleFormControlTextarea1">Description:</label>
                                        <textarea class="form-control form-rounded" id="exampleFormControlTextarea1" rows="3"></textarea>
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

                                      <div class="mb-3 mt-3">
                                      <label >Type:</label>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="radioButtonUnit" value = "Unit" onclick="changeRadioButton()">
                                          <label class="form-check-label" for="flexRadioDefault1">
                                            Unit
                                          </label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="radioButtonLiquid" value = "Liquid" onclick="changeRadioButton()" checked = "checked">
                                          <label class="form-check-label" for="flexRadioDefault2">
                                            Liquid(mL)
                                          </label>
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
                                      
                                      <div> <button  id="insert" name="insert" value="Insert" class="btn btn-dark text-uppercase mb-3 mt-3" onclick="printRadio()">Add</button> </div>
                                   
                                    </form>
                                </div>
                            </div>
                        </div>  


