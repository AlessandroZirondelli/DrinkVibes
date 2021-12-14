function animation() {
    const mediaQuery = window.matchMedia('(max-width: 768px)');

    mediaQuery.addEventListener('change', function (e) {
        if (mediaQuery.matches) { // If media query matches, so screen is smaller than 768px
                console.log("yellow");
                $('body > div:nth-child(1) > header:nth-child(1) > div:nth-child(1) > nav > div:last-child()').remove();
            } else {
                console.log("pink");
                $('body > div:nth-child(1) > header:nth-child(1) > div:nth-child(1) > nav > div').after(`<div class="col-md-1">
                <ul class="navbar-nav text-center">
                  <li class="col-md-6">
                      <a class="nav-link text-center text-white" href="#"> <i class="bi bi-cart"></i> </a>
                  </li>
                  
                  <li class="col-md-6">
                      <a class="nav-link text-center text-white" href="#"><i class="bi bi-person-circle"></i> </a>
                  </li>
                </ul>
              </div>`);
            }
    });
}

			
$(document).ready(function() {
	animation();
    //console.log($('body > div:nth-child(1) > header:nth-child(1) > div:nth-child(1) > nav > div:last-child()'));
});



/**
 * 
 * <div class="col-md-1">
            <ul class="navbar-nav text-center">
              <li class="col-md-6">
                  <a class="nav-link text-center text-white" href="#"> <i class="bi bi-cart"></i> </a>
              </li>
              
              <li class="col-md-6">
                  <a class="nav-link text-center text-white" href="#"><i class="bi bi-person-circle"></i> </a>
              </li>
            </ul>
          </div>
 * 
 * 
 * 
 * 
 */