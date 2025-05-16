$(document).ready(function() {
    //!! Show Hide Password ..........
    var is_show = true;
    $("#showPass").on("click", function() {
        if (is_show) {
            $("#showPass").removeClass("far fa-eye").addClass("far fa-eye-slash");
            $("#password").attr("type", "text");
            is_show = false;
        } else {
            $("#showPass").removeClass("far fa-eye-slash").addClass("far fa-eye");
            $("#password").attr("type", "password");
            is_show = true;
        }
    })

    //!! Re-Captcha...
    $(".re-captcha").on("click", function(e) {
        e.preventDefault();
        $('img').replaceWith('<img src="captcha_gen.php" />');
    })


    //!! Log in function ...........
    $('#signin').submit(function(e) {
        e.preventDefault();
        var userid = $("#userid").val();
        var password = $("#password").val();
        var chaptcha = $("#chaptcha").val();
        if (userid !== "" && password !== "" && chaptcha !== "") {
            $.ajax({
                url: "php_files/login.php",
                type: "POST",
                data: $('#signin').serialize(),
                beforeSend: function() {
                    $('#overlayer').show();
                    $('#submitBtn').html("");
                    $('#submitBtn').html("Loading...");
                },
                success: function(data) {
                    $('#overlayer').hide();
                    if (data == '4') {
                        $('#signin').trigger("reset");
                        $("#alert").html("");
                        $(".re-captcha").click();
                        $("#alert").removeClass('alert-success alert-warning').addClass('alert-danger').fadeIn(1000).html("Invalid Captcha Code.").fadeOut(3000);
                        $('#submitBtn').html("Sign In <i class='fas fa-sign-in-alt ml-2'></i>");
                    } else if (data == '3') {
                        $('#signin').trigger("reset");
                        $("#alert").html("");
                        $(".re-captcha").click();
                        $("#alert").removeClass('alert-success alert-warning').addClass('alert-danger').fadeIn(1000).html("Invalid Credential.").fadeOut(3000);
                        $('#submitBtn').html("Sign In <i class='fas fa-sign-in-alt ml-2'></i>");
                    } else if (data == '2') {
                        $('#signin').trigger("reset");
                        $("#alert").html("");
                        $(".re-captcha").click();
                        $("#alert").removeClass('alert-success alert-warning').addClass('alert-danger').fadeIn(1000).html("Invalid Password.").fadeOut(3000);
                        $('#submitBtn').html("Sign In <i class='fas fa-sign-in-alt ml-2'></i>");
                    } else if (data == '1') {
                        $('#signin').trigger("reset");
                        $("#alert").html("");
                        $("#alert").removeClass('alert-danger alert-warning').addClass('alert-success').fadeIn(1000).html("<i class='spinner-border mr-2' style='width: 1rem; height: 1rem;' role='status'></i>Loged In ! Please wait , Redirecting....");
                        setTimeout(function() {
                            window.location = 'page-dashboard.php';
                        }, 1000);

                    }
                }
            })
        } else {
            $("#alert").removeClass('alert-danger alert-success').addClass('alert-warning').fadeIn(1000).html("All Fields are required.").fadeOut(3000);
        }
    })



})