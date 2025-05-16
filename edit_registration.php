<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Registraion</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Date picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker-standalone.css" />
    <link rel="shortcut icon" href="images/android-chrome-192x192.png" />
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <style>
        /* Pre Loader */
        #loader {
            width: 100%;
            height: 100vh;
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--white);
            z-index: 999;
        }

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
            min-width: 100%;
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

<body>
    <!-- Loading Spinner -->
    <div id="overlayer" class="container-fluid" style="display: none;">
        <div class="row">
            <div id="loading">
                <img src="assets/img/hug.gif">
                <span>Loading....</span>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand mr-auto" href="#">
                <img src="assets/img/logo.png" alt="Bootstrap" width="80" height="40">
            </a>
            <ul class="navbar-nav mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="fw-bold">Registered Student Edit</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    include('php_files/database.php');
    // $obj = new Database();
    $Addobj = new Admission();

    $id = $_GET['id'];
    $Addobj->rawsql('SELECT * FROM registration WHERE s_id = ' . $id);
    $result = $Addobj->getResult();
    // echo "<pre>";
    // print_r($result);
    ?>
    <div class="container mt-md-5">
        <div class="row pb-5">
            <div class="col-md-8 col-12 offset-md-2 bg-light shadow-lg rounded">
                <form method="post" class="p-3" id="reg_form">
                    <div class="alert alert-danger alert-dismissible fade" role="alert" style="display:none;">
                    </div>
                    <!-- <div id="alertBox" class="col-12 alert alert-danger" role="alert"></div> -->
                    <table class="table table-responsive table-borderless">
                        <tbody>
                            <h3>Edit Registration Form:</h3>
                            <tr>
                                <td scope="row" class="text-end">Name<span class="text-danger">*</span></td>
                                <td><input type="text" class="form-control" value="<?= $result[0]['fname']; ?>" name="fname" id="fname" placeholder="First Name"></td>
                                <td><input type="text" class="form-control" value="<?= $result[0]['lname']; ?>" name="lname" id="lname" placeholder="Last Name"></td>
                                <input type="hidden" name="id" value="<?= $id ?>">
                            </tr>
                            <tr>
                                <td scope="row" class="text-end">Fathers' Name<span class="text-danger">*</span></td>
                                <td colspan="2"><input type="text" class="form-control" value="<?= $result[0]['father_name']; ?>" name="FatherName" id="father_name" placeholder="Fathers' name"> </td>
                            </tr>
                            <tr>
                                <td scope="row" class="text-end">Mothers' Name<span class="text-danger">*</span></td>
                                <td colspan="2"><input type="text" class="form-control" name="MotherName" value="<?= $result[0]['mother_name']; ?>" id="mother_name" placeholder="Mothers' name"> </td>
                            </tr>
                            <tr>
                                <td scope="row" class="text-end">Mobile<span class="text-danger">*</span></td>
                                <td colspan="2"><input type="number" pattern="0-9" class="form-control" name="mobile" value="<?= $result[0]['mobile']; ?>" id="mobile" placeholder="Enter Mobile"> </td>
                            </tr>
                            <tr>
                                <td scope="row" class="text-end">Gurdain Mobile<span class="text-danger">*</span></td>
                                <td colspan="2"><input type="number" pattern="0-9" class="form-control" name="gurdain_mobile" value="<?= $result[0]['gurdain_mobile']; ?>" id="gurdain_mobile" placeholder="Enter Gurdain Mobile"> </td>
                            </tr>
                            <tr>
                                <td scope="row" class="text-end">Email<span class="text-danger">*</span></td>
                                <td colspan="2"><input type="email" class="form-control" name="email" id="email" value="<?= $result[0]['email']; ?>" placeholder="Enter Email" autocomplete="off"> </td>
                            </tr>
                            <tr>
                                <td scope="row" class="text-end">Date of birth<span class="text-danger">*</span></td>
                                <td colspan="2"><input type="text" class="form-control datetimepicker" id="dob" name="dob" value="<?= $result[0]['dob']; ?>" data-inputmask='"mask": "99-99-9999"' data-mask> </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="pending_students.php" class="btn btn-info">Back</a>
                    <input type="submit" name="submit" value="Update" id="submit" class="btn btn-success float-end">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Input Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
    <!-- <script src="assets/js/registration.js"></script> -->

    <script>
        $(document).ready(function() {
            $("#reg_form").on("submit", function(e) {
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                var father_name = $("#father_name").val();
                var mother_name = $("#mother_name").val();
                var mobile = $("#mobile").val();
                var gurdain_mobile = $("#gurdain_mobile").val();
                var email = $("#email").val();
                var dob = $("#dob").val();

                if (fname == "") {
                    $(".alert").css('display', 'block').addClass('show').text('First name is required.');
                } else if (lname == "") {
                    $(".alert").css('display', 'block').addClass('show').text('Last name is required.');
                } else if (father_name == "") {
                    $(".alert").css('display', 'block').addClass('show').text('Fathers name is required.');
                } else if (mother_name == "") {
                    $(".alert").css('display', 'block').addClass('show').text('Mother name is required.');
                } else if (mobile == "") {
                    $(".alert").css('display', 'block').addClass('show').text('Mobile number is required.');
                } else if (gurdain_mobile == "") {
                    $(".alert").css('display', 'block').addClass('show').text('Gurdain Mobile number is required.');
                } else if (email == "") {
                    $(".alert").css('display', 'block').addClass('show').text('Email id is required.');
                } else if (dob == "") {
                    $(".alert").css('display', 'block').addClass('show').text('Date of birth is required.');
                } else {
                    var data = new FormData(this);

                    //! Modal Prevew .....

                    $("#modal1").modal('show');
                    $('#name').html(" " + fname + ' ' + lname);
                    $('#f_name').html(" " + father_name);
                    $('#m_name').html(" " + mother_name);
                    $('#m_number').html(" " + mobile);
                    $('#g_mobile').html(" " + gurdain_mobile);
                    $('#e_mail').html(" " + email);
                    $('#d_o_b').html(" " + dob);

                    $("#save-btn").click(function() {
                        $("#modal1").modal('hide');

                        //! Send AJAX data....
                        $.ajax({
                            url: "php_files/edit_registration.php",
                            type: "POST",
                            data: data,
                            contentType: false,
                            processData: false,
                            beforeSend: function() {
                                $('#overlayer').show();
                            },
                            success: function(data) {
                                var result = jQuery.parseJSON(data);
                                if (result.status == 'error') {
                                    var msg = result.msg;
                                    $(".alert").css('display', 'block').addClass('show').text(msg);
                                } else {
                                    $("#reg_form").trigger('reset');
                                    var msg = result.msg;
                                    alert(msg);
                                    window.location = 'pending_students.php';
                                }
                                $('#overlayer').hide();
                            }
                        });
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('[data-mask]').inputmask();
        });
    </script>
</body>

</html>


<!-- Modal -->
<div class="modal fade" id="modal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><u>Verify Registration Form</u></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td width='50%'><label>Name : </label></td>
                            <td><span id="name"></span></td>
                        </tr>
                        <tr>
                            <td><label>Father's Name : </label></td>
                            <td><span id="f_name"></span></td>
                        </tr>
                        <tr>
                            <td><label>Mother's Name : </label></td>
                            <td><span id="m_name"></span></td>
                        </tr>
                        <tr>
                            <td><label>Mobile : </label></td>
                            <td><span id="m_number"></span></td>
                        </tr>
                        <tr>
                            <td><label>Gurdain Mobile : </label></td>
                            <td><span id="g_mobile"></span></td>
                        </tr>
                        <tr>
                            <td><label>Email : </label></td>
                            <td><span id="e_mail"></span></td>
                        </tr>
                        <tr>
                            <td><label>Date of Birth : </label></td>
                            <td><span id="d_o_b"></span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" id="save-btn" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>