<?php
session_start();
if (isset($_SESSION['admin_role'])) {
?>
    <script>
        location.href = "page-dashboard.php";
    </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo1.png">
    <link rel="manifest" href="assets/img/favicon">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- fontAwesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4@5.0.12/bootstrap-4.min.css">
    <!-- Captcha  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/1427e911f0.js" crossorigin="anonymous"></script>
    <style>
        /* Pre Loader */

        #overlayer {
            background: rgba(0, 0, 0, 0.6);
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            display: grid;
            place-items: center;
        }

        #loading {
            width: 100%;
            position: relative;
            padding: 15px;
            border-radius: 4px;
            background: #dfe6e9;
        }

        #loading img {
            height: 60px;
            width: 60px;
        }

        #loading span {
            color: #000;
        }
    </style>
</head>

<body class="hold-transition login-page" oncontextmenu="javascript:RightClick();return false;" oncopy="return false" onpaste="return false">
    <!-- Loading Spinner -->
    <div id="overlayer" class="container-fluid" style="display:none ;">
        <div class="row">
            <div id="loading">
                <img src="assets/img/hug.gif">
                <span>Loading....</span>
            </div>
        </div>
    </div>

    <div class="login-box">
        <div id="alert" class="col-12 alert" role="alert" style="display: none;">
        </div>
        <!-- /.login-logo -->
        <div class="card card-outline card-danger">
            <div class="card-header text-center">
                <p class="h1"><b>Control Panel</b></p>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form id="signin">
                    <label for="">Username:</label>
                    <div class="input-group mb-3">
                        <input type="text" id="userid" class="form-control" name="userId" placeholder="Username" autocomplete="off" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span><i class="far fa-envelope"></i></span>
                            </div>
                        </div>
                    </div>
                    <label for="">Password:</label>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="passWord" class="form-control" placeholder="Password" autocomplete="off" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span><i id="showPass" class="far fa-eye"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="captcha_gen.php" />
                        </div>
                        <div class="col-md-1 my-auto">
                            <span><a href="#"><i class="fa-solid fa-arrows-rotate re-captcha"></i></a></span>
                        </div>
                        <div class="col-md-5">
                            <input type="text" id="chaptcha" name="chaptcha" class="form-control" placeholder="Enter Captcha" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 my-3">
                            <button type="submit" id="submitBtn" class="btn btn-primary btn-block">Sign In <i class="fas fa-sign-in-alt ml-2"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <a class="mt-4" href="../index.php">Got to home page <i class="fa fa-home" aria-hidden="true"></i></a>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.32/sweetalert2.min.js"></script>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/Toaster.js"></script>
</body>

</html>