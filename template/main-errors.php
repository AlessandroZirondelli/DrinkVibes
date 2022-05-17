<?php $errorNum = $_GET["errorNum"]; ?>
<div class="container my-5 ">
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Some errors occurs!</h4>
    <p> Error <?php echo $errorNum ?> </p>
    <hr>
    <p class="mb-0">Please retry again ! Click here</p>
  </div>
</div>