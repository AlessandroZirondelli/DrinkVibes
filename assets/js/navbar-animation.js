function animation() {
    const mediaQuery = window.matchMedia('(max-width: 768px)');

    mediaQuery.addEventListener('change', function (e) { //non esegue ad ogni singolo resize, ma solo nei determinati breakpoint !!!
        if (mediaQuery.matches) { // If media query matches, so screen is smaller than 768px
                
                //console.log($('body > div:nth-child(1) > header:nth-child(1) > div:nth-child(1) > nav > div:last-child() ul'));

                

                $('body > div:nth-child(1) > header:nth-child(1) > div:nth-child(1) > nav > div:last-child() ul ').remove(); // rimuovo il div contenente le due icone: carrello e utente
                console.log($('body > div:nth-child(1) > header:nth-child(1)  > div:nth-child(1) > nav:nth-child(1) > a:nth-child(1)')); // seleziono il navbar brand "DrinkShop"
                
                $('body > div:nth-child(1) > header:nth-child(1)  > div:nth-child(1) > nav:nth-child(1) > a:nth-child(1)').after(`
                    <div class="col-7 "> 
                        <ul>
                                
                                <li style="display:inline;">
                                    <a class="nav-link text-center text-white" href="#"> <i class="bi bi-cart"></i> </a>
                                </li>
                                        
                                <li style="display:inline;">
                                    <a class="nav-link text-center text-white" href="#"><i class="bi bi-person-circle"></i> </a>
                                </li>
                                
                        </ul>
                    </div>
                `);


            } else {
        

            }
    });
}

			
$(document).ready(function() {
    /*if($(window).width()<=768){
        console.log("piccolo schermo");
    }*/
   // console.log($('body > div:nth-child(1) > header:nth-child(1) > div:nth-child(1) > nav > div'));
	//animation();
    //console.log($('body > div:nth-child(1) > header:nth-child(1) > div:nth-child(1) > nav > div:last-child()'));

    console.log($(".navbar-collapse ul li:nth-child(1)"));
});



