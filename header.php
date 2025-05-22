<?php
// session.user_strict_mode =1
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['admin_role'])) {
?>
    <script>
        location.href = "index.php";
    </script>
<?php
}
include('php_files/database.php');
$obj = new Database();
$Addobj = new Admission();


//Wallet Ballance.....
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.fast2sms.com/dev/wallet",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTPHEADER => array(
        "authorization:hmlbFHwuQK79aBykpARfDrWtTJ5GvOc4Nj0Z1z3i6Cq2VxonXsFO1us5HXwavx6PIMWn7JDZTRmB4bor"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="Bice Institute Of Competitive Exams Pvt Ltd | The Best Training Center for Competitive Exams">
        <meta name="keywords" content="Bice, The Best Training Center for Competitive Exams, Competitive Exams Center ">
        <meta name="author" content="Bishal Tech Pvt.">

        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/logo1.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/logo1.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo1.png">
        <!-- <link rel="manifest" href="../assets/img/favicon"> -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
        <!-- Bootstrap Icon  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <!-- jquery CDN link -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <!-- Bootstrap CDN link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
        <!-- Ajax CDN  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/pace-theme-default.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4@5.0.12/bootstrap-4.min.css">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        
        <link rel="stylesheet" href="assets/data/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="assets/data/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="assets/data/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="assets/css/admin.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title><?php echo PAGE ?></title>

    </head>

    <!-- oncontextmenu="javascript:RightClick();return false;" oncopy="return false" onpaste="return false" -->

    <body class="hold-transition sidebar-mini pace-primary" oncontextmenu="javascript:RightClick();return false;">
        <!-- <body class="hold-transition sidebar-mini pace-primary" oncontextmenu="javascript:RightClick();return false;" oncopy="return false"> -->
        <!-- Loading Spinner -->
        <div id="overlayer" class="container-fluid" style="display: none;">
            <div class="row">
                <div id="loading">
                    <img src="assets/img/hug.gif">
                    <span>Loading....</span>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item">
                        <button class="btn">
                        <?php
                        $result = json_decode($response, true);
                        $smsblz = ($result['wallet']);
                        $totalsms = $smsblz * 4;
                        echo 'SMS : <span class="badge bg-success" >' . $totalsms . '</span>';
                    }
                        ?>
                        </button>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu dropdown-menu-left">
                            <a href="#" class="dropdown-item disabled">
                                <i class="bi bi-person mr-2"></i> Welcome <?php echo $_SESSION['admin_name'] ?>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="change_password.php" class="dropdown-item">
                                <i class="bi bi-key mr-2"></i></i> Change Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" id='logout'>
                                <i class="bi bi-box-arrow-right mr-2"></i></i> Log Out
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Top header end here  -->