<div class="container d-flex align-items-center justify-content-center my-5 ">
  <div class="row">
      <form name="registrationForm" action="./utils/uploadAccount.php" onsubmit="return validateRegistrationForm()" method="POST" autocomplete="off" class="bg-light border p-3">
        <div class="form-row">
          <h4 class="title my-3">Registration</h4>

          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input name="name" type="text" class="input form-control" id="name" placeholder="Name" />
            </div>
          </div>

          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input name="surname" type="text" class="input form-control" id="surname" placeholder="Surname" />
            </div>
          </div>

          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input name="userID" type="text" class="input form-control" id="userID" placeholder="Username" />
            </div>
          </div>


          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-paper-plane"></i></span>
              </div>
              <input name="email" type="text" class="input form-control" id="email" placeholder="E-mail" />
            </div>
          </div>

          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
              </div>
              <input name="birthday" type="text" class="input form-control" id="birthday" placeholder="Birthday" />
            </div>
          </div>

          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>
              <input name="password1" type="password" class="input form-control" id="password1" placeholder="Password" />
            </div>
          </div>

          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>
              <input name="password2" type="password" class="input form-control" id="password2" placeholder="Reapet Password" />
            </div>
          </div>

          <?php if (isset($_SESSION["type"]) == "Admin") : ?>
            <div class="col-12">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <div id="tipology" class="mb-3 mt-3">
                  <label>Type:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="optradiotipology" <?php if (isset($_SESSION["type"]) && $_SESSION["type"] == "Admin"); ?> id="radioButtonAdmin" value="Admin" onclick='changeRadioButton("Admin")' checked>
                    <label class="form-check-label" for="radioButtonAdmin">
                      Admin
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="optradiotipology" <?php if (isset($_SESSION["type"]) && $_SESSION["type"] == "Admin"); ?> id="radioButtonUser" value="User" onclick='changeRadioButton("User")' checked>
                    <label class="form-check-label" for="radioButtonUser">
                      User
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="optradiotipology" <?php if (isset($_SESSION["type"]) && $_SESSION["type"] == "Admin"); ?> id="radioButtonExpress" value="Express" onclick='changeRadioButton("Express")' checked>
                    <label class="form-check-label" for="radioButtonExpress">
                      Express
                    </label>
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <div class="col-12 text-right">
              <input type="submit" name="insertButton" value="Submit" class="btn btn-dark text-uppercase mb-3 mt-3" ></button>
            </div>

        </div>
      </form>
  </div>
</div>