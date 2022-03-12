function read(){
    console.log("letto");
    console.log($("#file-input").val());
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