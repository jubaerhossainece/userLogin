
 function isPasswordMatch() {
    var password = $("#newpass").val();
    var confirmPassword = $("#repass").val();

    if (password != confirmPassword){ 
        $("#divCheckPassword").html("Password Not Matched!").css('color','red');
         $('#updatepass').prop('disabled' , true);
    }
    else{
      $("#divCheckPassword").html("✔ Password Matched").css('color','green');
        $('#updatepass').prop('disabled' , false);
    } 
}

$(document).ready(function () {
    $("#repass").keyup(isPasswordMatch);
});




    