<?php
include('database.php');
$obj = new Database();
$id = $obj->escapeString($_POST['id']);

// print_r($resultfees);
// die;
echo '<div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="staticBackdropLabel">Students Fees Details</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="table-responsive">
                                <table border="1px" class="table table-bordered text-center">
                                <thead class="table-secondary">
                                        <tr>
                                            <th scope="row">Month</th>
                                            <td>Jan</td>
                                            <td>Feb</td>
                                            <td>Mar</td>
                                            <td>Apr</td>
                                            <td>May</td>
                                            <td>Jun</td>
                                            <td>Jul</td>
                                            <td>Aug</td>
                                            <td>Sep</td>
                                            <td>Oct</td>
                                            <td>Nov</td>
                                            <td>Dec</td>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    
                                $obj->rawsql("SELECT * FROM new_students_months_2023 LEFT JOIN new_students_fees_2023 ON new_students_months_2023.id = new_students_fees_2023.id WHERE new_students_months_2023.s_id = $id");
                                $resultfees = $obj->getResult();
                                if(count($resultfees)>0){
                                    echo '<tr>
                                            <th scope="row">Fees</th>
                                            <td><span class="btn btn-sm btn-success">'.$resultfees[0]['jan'].'</span></td>
                                            <td><span class="btn btn-sm btn-success">'.$resultfees[0]['feb'].'</span></td>
                                            <td><span class="btn btn-sm btn-success">'.$resultfees[0]['mar'].'</span></td>
                                            <td><span class="btn btn-sm btn-success">'.$resultfees[0]['apr'].'</span></td>
                                            <td><span class="btn btn-sm btn-success">'.$resultfees[0]['may']. '</span></td>
                                            <td><span class="btn btn-sm btn-success">'.$resultfees[0]['jun']. '</span></td>
                                            <td><span class="btn btn-sm btn-success">'.$resultfees[0]['jul']. '</span></td>
                                            <td><span class="btn btn-sm btn-success">'.$resultfees[0]['aug']. '</span></td>
                                            <td><span class="btn btn-sm btn-success">'.$resultfees[0]['sep']. '</span></td>
                                            <td><span class="btn btn-sm btn-success">'.$resultfees[0]['oct']. '</span></td>
                                            <td><span class="btn btn-sm btn-success">'.$resultfees[0]['nov']. '</span></td>
                                            <td><span class="btn btn-sm btn-success">'.$resultfees[0]['dece']. '</span></td>
                                        </tr>';
                                }else{
                                    echo '<h3 class="text-center">No Fess Found</h3>';
                                }
                                $obj->rawsql("SELECT * FROM new_students_fees_2023 LEFT JOIN new_students_months_2023 ON new_students_fees_2023.id = new_students_months_2023.id WHERE new_students_months_2023.s_id = $id");
                                $resultmonths = $obj->getResult();
                                if (count($resultmonths) > 0) {
                                    echo '<tr>
                                            <th scope="row">Date</th>
                                            <td>'.$resultmonths[0]['jan'].'</td>
                                            <td>'.$resultmonths[0]['feb'].'</td>
                                            <td>'.$resultmonths[0]['mar'].'</td>
                                            <td>'.$resultmonths[0]['apr'].'</td>
                                            <td>'.$resultmonths[0]['may'].'</td>
                                            <td>'.$resultmonths[0]['jun'].'</td>
                                            <td>'.$resultmonths[0]['jul'].'</td>
                                            <td>'.$resultmonths[0]['aug'].'</td>
                                            <td>'.$resultmonths[0]['sep'].'</td>
                                            <td>'.$resultmonths[0]['oct'].'</td>
                                            <td>'.$resultmonths[0]['nov'].'</td>
                                            <td>'.$resultmonths[0]['dece'].'</td>
                                        </tr>';
                                    }
                                   echo '</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg mr-2"></i>Close</button>
                </div>
            </div>';