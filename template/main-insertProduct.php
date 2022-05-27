<h1 class="m-3">Add new product</h1>

<div class="container d-flex justify-content-center">

    <div class="card col-md-6 mb-2 product-wap rounded-0 d-flex justify-content-center">
        <div class="card-inner">
            <img id="imgProduct" class="card-img rounded-0" src="assets/img/prd_default.png" alt="photo product">
        </div>
        <div class="card-body pb-0 pt-0 ps-0 mx-2">
            <form id="formIdProduct" action="utils/addProduct.php" method='POST' enctype="multipart/form-data">
                <div class="text-decoration-none mb-3 mt-3" id="nameDiv">
                    <label for="name">Name:</label>
                    <input class="form-control form-rounded " name="name" type="text" id="name" placeholder="Name" value="">
                </div>

                <div class="mx-1">
                    <hr class="line my-0">
                </div>

                <div class="image-upload mb-3 mt-3">
                    <label for="image">Product's Image:</label>
                    <input type="file" id="image" name="imageToSave" accept="image/png , image/jpeg" />
                </div>

                <div class="mx-1">
                    <hr class="line my-0">
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="textArea">Description:</label>
                    <textarea name="description" class="form-control form-rounded" id="textArea" rows="3"></textarea>
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
                    <fieldset>
                        <label>Type:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="optradiotipology" id="radioButtonWine" value="Wine" checked>
                            <label class="form-check-label" for="radioButtonWine">
                                Wine
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="optradiotipology" id="radioButtonBeverage" value="Beverage">
                            <label class="form-check-label" for="radioButtonBeverage">
                                Beverage
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="optradiotipology" id="radioButtonDrink" value="Drink">
                            <label class="form-check-label" for="radioButtonDrink">
                                Drink
                            </label>
                        </div>
                    </fieldset>
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

                <div> <button type="submit" id="insert" name="insert" value="Insert" class="btn btn-dark text-uppercase mb-3 mt-3">Add</button> </div>
                <div id="warningsLabel"></div>
            </form>
        </div>
    </div>
</div>