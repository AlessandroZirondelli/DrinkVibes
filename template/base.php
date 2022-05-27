<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="./assets/css/base-style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <?php 
    if(isset($cssArray)){
      foreach($cssArray as $tmpCss){
        echo '<link href="'.$tmpCss.'" rel="stylesheet" type="text/css" />';
      }
    }
    
  ?>

  <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous">
  </script>

   <?php 
   if(isset($jsArray)){
    foreach($jsArray as $tmpJs){
      echo '<script src="'.$tmpJs.'"></script>';
    }
   } 
  ?>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous">
  </script>
  <title> <?php echo $templateParams["title"]; ?> </title>
</head>

<body class="bg-white">
  <div class="container-fluid p-0 overflow-hidden">
    <header>
      <div class="row">

        <nav class="navbar navbar-expand-lg navbar-light py-4"> <!-- Accessibility is ensured by bootstrap by wrapping everything with a nav -->
          <a class="navbar-brand text-white me-0 col-3 col-lg-2 ps-3" href="#">Drink Vibes</a>  <!-- It always works, when it is big and small-->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu"   
            aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation"> <!-- It works when it is small -->
            <span class="navbar-toggler-icon text-white"></span>
          </button>
          <div class="collapse navbar-collapse col-lg-10" id="toggleMobileMenu">
            <div class="col-12">
              <ul class="navbar-nav ">
                <li class="col-lg-2">
                  <a class="nav-link text-start text-white" href="./index.php">Home</a>
                </li>
                <li class="col-lg-2">
                  <a class="nav-link text-white text-start" href="./products.php">Products</a>
                </li>
                <li class="col-lg-2">
                  <a class="nav-link text-white" href="./makeyourdrink.php">Make drinks</a>
                </li>
                <li class="col-lg-2">
                  <a class="nav-link text-white" href="./orders.php">Orders</a>
                </li>
                <li class="col-lg-2">
                  <a class="nav-link text-white" href="./aboutus.php">About us</a>
                </li>
                
                <li class="icons-link col-lg-2">
                  <ul class="p-0 text-center">
                    <li>
                    <a class="nav-link  text-white" href="./shoppingcart.php" title="Cart"> <i class="bi bi-cart"></i> </a>
                    </li>
                    <li >
                      <a class="nav-link  text-white" href="./login.php" title="User profile"><i class="bi bi-person-circle"></i> </a>
                    </li>
                    <li>
                      <a class="nav-link  text-white" href="./notifications.php" title="Notifications "><i class="bi bi-bell"></i> </a>
                    </li>
                  </ul>
                </li>

              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>

    
   <?php 
    if(isset($templateParams["aside-content"])){
      require($templateParams["aside-content"]); 
    }
   ?> <!-- Check if aside exists or not. -->

   <main>
    <?php require($templateParams["main-content"]); ?>
   </main>

   <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 pt-5">
                <h2 class="h2 border-bottom pb-3 border-light" id="footer-category" >Drink Vibes</h2>
                <ul class="list-unstyled text-light ">
                    <li>
                        Italy, Cesena, Via Montalti, 69
                    </li>
                    <li>
                        <a class="text-decoration-none" href="tel:000-000-000">000-000-000</a>
                    </li>
                    <li>
                        <a class="text-decoration-none" href="mailto:baggianisrl@gmail.com">baggianisrl@gmail.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 border-bottom pb-3 border-light" id="footer-category">Products</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Wine</a></li>
                    <li><a class="text-decoration-none" href="#">Beverages</a></li>
                    <li><a class="text-decoration-none" href="#">Spirits</a></li>
                    <li><a class="text-decoration-none" href="#">Drinks</a></li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 border-bottom pb-3 border-light" id="footer-category">Further Info</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="./index.php">Home</a></li>
                    <li><a class="text-decoration-none" href="./products.php">Products</a></li>
                    <li><a class="text-decoration-none" href="./makeyourdrink.php">Make drinks</a></li>
                    <li><a class="text-decoration-none" href="./orders.php">Orders</a></li>
                    <li><a class="text-decoration-none" href="./aboutus.php">About us</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="row">
              <div class="col-12">
                  <p class="text-center text-white">
                     Copyright &copy; 2021 Baggiani S.R.L | Designed by Baggiani S.R.L
                  </p>
              </div>
        </div>
    </div>
   </footer>
  </div>

</body>

</html>