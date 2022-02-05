function submitQuantity(id){
    var inputSelected = "#qtn" + id;

    if($.isNumeric($(inputSelected).val())){
        $(inputSelected).css("border-color","black");
        var quantity = $(inputSelected).val();
       

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("hint").innerHTML = this.responseText;
            
        }
        
        xhttp.open("GET", "gettable.php?qtn="+quantity+"&id="+id);
        xhttp.send();

    }else{
        $(inputSelected).css("border-color","red")
                        .css("border-width","3px");
        //$(inputSelected).parent().next().css("display","block");
        
    }
}