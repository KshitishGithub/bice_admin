<?php
include('database.php');
$obj = new Database();
$id = $obj->escapeString($_POST['id']);
$obj->rawsql("SELECT o.stu_sl ,o.name , o.mobile , o.date FROM old_students o WHERE o.stu_sl = $id");
$result = $obj->getResult();
// echo '<pre>';
// print_r($result);   
// die;
echo '<div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Collect Fees</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="50%">Name:</td>
                                        <td>' . $result[0]['name'] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Mobile:</td>
                                        <td>+91-' . $result[0]['mobile'] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Joining Date:</td>
                                        <td>' . $result[0]['date'] . '</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="student_id" id="student_id" value="' . $result[0]['stu_sl'] . '">
                                            <select class="form-control" name="month" id="months">
                                                <option value="" selected disabled>-Select Month-</option>
                                                <option value="jan">January</option>
                                                <option value="feb">February</option>
                                                <option value="mar">March</option>
                                                <option value="apr">April</option>
                                                <option value="may">May</option>
                                                <option value="jun">June</option>
                                                <option value="jul">July</option>
                                                <option value="aug">August</option>
                                                <option value="sep">Septembar</option>
                                                <option value="oct">October</option>
                                                <option value="nov">Novembar</option>
                                                <option value="dece">Decembar</option>
                                            </select>
                                        <td>
                                            <input type="number" name="fees_amount" id="Fees" placeholder="Enter Fees Amount" class="form-control">
                                        </td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal_close" data-bs-dismiss="modal"><i class="bi bi-x-lg mr-1"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-currency-rupee mr-1"></i>Collect</button>
                </div>';
