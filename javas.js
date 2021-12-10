function closeAllCollapse(){
        $(".card-header").next().filter(".show")
        .attr("aria-expanded",false)
        .collapse('toggle');
        $(".card-header").removeClass("selected");
}
$(document).ready(function(){
    $(".card-header").click(function(){
        if($(this).next().hasClass("show")){
            $(this).removeClass("selected");
            $(this).children().attr("aria-expanded",false);        
            $(this).next().collapse('toggle'); 
        }
        else{
            closeAllCollapse(); 
            $(this).addClass("selected");
            console.log($(".card-header").next());
            $(this).children().attr("aria-expanded",true);
            $(this).next().collapse('toggle');
        }
    });
});

