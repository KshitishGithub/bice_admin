<?php
define('PAGE', 'home');
include('header.php');
include('sidebar.php');
?>
<div class="content-wrapper">
    <div class="row mx-auto">
        <div class="offset-md-4 mt-5">
            <div class="col-md-8">
                <div id="alertBox" class="col-12 alert alert-danger" role="alert" style="display: none;">
                </div>
                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                        <a href="#" class="h1"><b>Admin</b></a>
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
                        <form id="changepass">
                            <div class="input-group mb-3">
                                <input type="password" id="oldpass" name="oldpass" class="form-control" placeholder="Old Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" id="newpass" name="newpass" class="form-control" placeholder="New Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" id="cnewpass" name="cnewpass" class="form-control" placeholder="Confirm New Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 ">
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-key mr-1"></i>Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.login-box -->
<?php
include('footer.php');
?>