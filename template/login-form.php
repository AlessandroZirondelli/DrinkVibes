
<div class="container-fluid ">
  <div class="row d-flex justify-content-center align-items-center m-0" >
    <div class="login_oueter justify-content-center">
        
      <form action="#" method="POST" id="login" autocomplete="off" class="bg-light border p-3">
        <div class="form-row">
          <h4 class="title my-3">Login For Access</h4>
          
            
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
                <span class="input-group-text" ><i class="fas fa-lock"></i></span>
              </div>
              <input name="password" type="password" class="input form-control" id="password" placeholder="Password" />
              
            </div>
            
          </div>
          
          <div class="col-sm-12 pt-3 text-left">
            <p>Already registered <a href="contatti.php">Register</a></p> 
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

