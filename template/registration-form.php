
<div class="container-fluid ">
  <div class="row d-flex justify-content-center align-items-center m-0" >
    <div class="login_oueter justify-content-center">
        
      <form action="#" method="POST" id="login" autocomplete="off" class="bg-light border p-3">
        <div class="form-row">
          <h4 class="title my-3">Registration</h4>
          
            
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" ><i class="fas fa-user"></i></span>
              </div>
              <input name="name" type="text" class="input form-control" id="name" placeholder="Name" />
            </div>
          </div>

          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" ><i class="fas fa-user"></i></span>
              </div>
              <input name="surname" type="text" class="input form-control" id="surname" placeholder="Surname" />
            </div>
          </div>

        <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" ><i class="fas fa-user"></i></span>
              </div>
              <input name="userID" type="text" class="input form-control" id="userID" placeholder="Username" />
            </div>
          </div>


          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" ><i class="fas fa-paper-plane"></i></span>
              </div>
              <input name="email" type="text" class="input form-control" id="email" placeholder="E-mail" />
            </div>
          </div>

          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" ><i class="fas fa-calendar-alt"></i></span>
              </div>
              <input name="birthday" type="text" class="input form-control" id="birthday" placeholder="Birthday" />
            </div>
          </div>

          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" ><i class="fas fa-lock"></i></span>
              </div>
                <input name="password" type="password" class="input form-control" id="password" placeholder="Password" />
            </div>
          </div>
          
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" ><i class="fas fa-lock"></i></span>
              </div>
                <input name="pwd" type="password" class="input form-control" id="pwd" placeholder="Reapet Password" />
            </div>
          </div>
          
          <?php if(isset($_SESSION["type"])=="Admin"): ?> 
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" ><i class="fas fa-user"></i></span>
              </div>
              Type: <input type="radio" name="type" <?php if (isset($_SESSION["type"]) && $_SESSION["type"]=="Admin") ;?> value="Admin">Admin
              <input type="radio" name="type" <?php if (isset($_SESSION["type"]) && $_SESSION["type"]=="User") ;?> value="User">User
              <input type="radio" name="type" <?php if (isset($_SESSION["type"]) && $_SESSION["type"]=="Express") ;?> value="Express">Express
  
            </div>
          </div>
          <?php  endif;?> 




          <div class="col-12 text-right">
          <input type="submit" name="login" value="Login" />
               
          </div>
          <?php if(isset($templateParams["errorevuoto"])): ?>
            <p><br><?php echo $templateParams["errorevuoto"]; ?></br></p>
          <?php endif; ?>
          <?php if(isset($templateParams["erroreusata"])): ?>
            <p><br><?php echo $templateParams["erroreusata"]; ?></br></p>
          <?php endif; ?>

          <?php if(isset($templateParams["lettere"])): ?>
            <p><br><?php echo $templateParams["lettere"]; ?></br></p>
          <?php endif; ?>

          <?php if(isset($templateParams["data"])): ?>
            <p><br><?php echo $templateParams["data"]; ?></br></p>
          <?php endif; ?>

          <?php if(isset($templateParams["email"])): ?>
            <p><br><?php echo $templateParams["email"]; ?></br></p>
          <?php endif; ?>

          <?php if(isset($templateParams["vino"])): ?>
            <p><br><?php echo $templateParams["vino"]; ?></br></p>
          <?php endif; ?>

          <?php if(isset($templateParams["acqua"])): ?>
            <p><br><?php echo $templateParams["acqua"]; ?></br></p>
          <?php endif; ?>

          <?php if(isset($templateParams["pwd"])): ?>
            <p><br><?php echo $templateParams["pwd"]; ?></br></p>
          <?php endif; ?>

        </div>
      </form>
    </div>
  </div>
</div>

