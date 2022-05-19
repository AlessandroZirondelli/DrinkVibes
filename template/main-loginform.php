<div class="container d-flex align-items-center justify-content-center my-5">
  <div class="row">
    <form action="#" method="POST" id="login" autocomplete="off" class="bg-light border py-3 px-5 ">
      <div class="form-row ">
        <h4 class="title my-3 pb-2">Login For Access</h4>
        <div class="col-12">
          <div class="input-group mb-3 px-4">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input name="username" type="text" class="input form-control" id="username" placeholder="Username" />
          </div>
        </div>
        <div class="col-12">
          <div class="input-group mb-3 px-4">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input name="password" type="password" class="input form-control" id="password" placeholder="Password" />

          </div>

        </div>

        <div class="col-sm-12 pt-3 text-left">
          <p>Not registered <a href="registration.php">Register</a></p>
        </div>

        <div class="col-12 text-right">
          <input type="submit" class="btn btn-dark text-uppercase " name="submit" value="Login" />
        </div>

        <?php if (isset($templateParams["errorelogin"])) : ?>
          <p><br><?php echo $templateParams["errorelogin"]; ?></br></p>
        <?php endif; ?>
      </div>
    </form>
  </div>
</div>