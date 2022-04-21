<h1 class="m-3">Add new product</h1>

<div class="container d-flex justify-content-center">
    <div class="col-md-12 ">
        <div class="card col-md-6 mb-2 product-wap rounded-0 d-flex justify-content-center">
            <div class="card-inner">
                <img id="imgProduct" class="card-img rounded-0" src="assets/img/i.png" alt="photo product">
            </div>
            <div class="card-body pb-0 pt-0 ps-0 mx-2">
                <form action="uploadImgProduct.php" method='POST' enctype="multipart/form-data">
                    <div class="text-decoration-none mb-3 mt-3" id="nameDiv">
                        <label for="name">Name:</label>
                        <input class="form-control form-rounded " name="name" type="text" id="name" placeholder="Name" value="">
                    </div>

                    <div class="mx-1">
                        <hr class="line my-0">
                    </div>

                    <div class="image-upload mb-3 mt-3">
                        <label for="Image">Product's Image:</label>
                        <input type="file" id="Image" name="imageToSave" accept="image/png , image/jpeg" value="assets/img/i.png" />
                    </div>

                    <div class="mx-1">
                        <hr class="line my-0">
                    </div>

                    <div class="form-group mb-3 mt-3">
                        <label for="TextArea">Description:</label>
                        <textarea class="form-control form-rounded" id="TextArea" rows="3"></textarea>
                    </div>

                    <div class="mx-1">
                        <hr class="line my-0">
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="qtn">Quantity:</label>
                        <input name="qtn" type="text" class="form-control form-rounded" id="qtn" placeholder="Quantity">
                    </div>

                    <div class="mx-1">
                        <hr class="line my-0">
                    </div>

                    <div id="tipology" class="mb-3 mt-3">
                        <label>Type:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="optradiotipology" id="radioButtonWine" value="Wine" onclick='changeRadioButton("Wine")' checked>
                            <label class="form-check-label" for="radioButtonWine">
                                Wine
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="optradiotipology" id="radioButtonBeverage" value="Beverage" onclick="changeRadioButton('Beverage')" >
                            <label class="form-check-label" for="radioButtonBeverage">
                                Beverage
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="optradiotipology" id="radioButtonDrink" value="Drink" onclick="changeRadioButton('Drink')" >
                            <label class="form-check-label" for="radioButtonDrink">
                                Drink
                            </label>
                        </div>
                    </div>

                    <div class="mx-1">
                        <hr class="line my-0">
                    </div>



                    <div class="mb-3 mt-3">
                        <label for="price">Price:</label>
                        <input name="price" type="text" class="form-control form-rounded" id="price" placeholder="Price">
                    </div>

                    <div class="mx-1">
                        <hr class="line my-0">
                    </div>

                    <div> <button  id="insert" name="insert" value="Insert" class="btn btn-dark text-uppercase mb-3 mt-3" onclick="addProduct()">Add</button> </div>
                </form>
            </div>
        </div>
</div>
    </div>