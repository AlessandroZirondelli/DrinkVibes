
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
              <input name="username" type="text" class="input form-control" id="username" placeholder="Username" />
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
          
          <div class="col-sm-12 pt-3 text-left">
            <p>Already registered <a href="registration.php">Register</a></p> 
          </div>
          <div class="col-12 text-right">
          <input type="submit" name="submit" value="Login" />
               
          </div>
          <?php if(isset($templateParams["errorelogin"])): ?>
            <p><?php echo $templateParams["errorelogin"]; ?></p>
            <?php endif; ?>
        </div>
      </form>
    </div>
  </div>
</div>

