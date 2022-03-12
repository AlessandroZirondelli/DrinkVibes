function addIngredient(){
    var action = 1;
    const xhttp = new XMLHttpRequest();
    
    xhttp.onload = function() {

    }
    xhttp.open("GET", "uploadIngredient.php?action="+ action);
    xhttp.send();
    console.log("add");
   // console.log($("#file-input").val());
}
$(document).ready(function(){
    $("#Image").change(function () {
        console.log("letto1");
        console.log($("#Image").val());
        if (this.files && this.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {

                $('#imgIngredient').attr('src', e.target.result);

            }

            reader.readAsDataURL(this.files[0]);

        }

    });
});