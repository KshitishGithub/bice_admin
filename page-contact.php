<?php
define("PAGE", "Contact");
include('header.php');
include('sidebar.php');

?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <!-- <button type="button" class="btn btn-success float-right mb-3" data-bs-toggle="modal" data-bs-target="#MyModal">Add Notice</button> -->
            <div class="card card-row">
                <div class="card-header">
                    <h3 class="card-title">
                        <h3>Contact Section:</h3>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th>Sr.</th>
                                    <th>Name</th>
                                    <th>Phone No.</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $obj->select('contact','*',null ,null ,'id DESC');
                                    $result = $obj->getResult();
                                    if (count($result) > 0) {
                                        $i = 1;
                                        foreach ($result as list('id'=>$id,'name'=> $name , 'email'=>$email , 'number'=>$number , 'message'=>$message)) {
                                            echo '<tr>
                                                    <td width=4%>'.$i. '</td>
                                                    <td width=14%>' . $name . '</td>
                                                    <td width=14%>' . $email . '</td>
                                                    <td width=14%>' . $number . '</td>
                                                    <td>' . $message . '</td>
                                                    <td width=5%><button type="button" data-contect_id='.$id.' class="btn btn-outline-danger btn-sm mb-3" id="DeleteContact"><i class="bi bi-trash3"></i></button></td>
                                                </tr>';
                                        $i++;
                                        }
                                    }else{
                                        echo "No Data Found";
                                    }
                                    
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include('footer.php');
?>