<?php
include('database.php');
$obj = new Database();
$obj->select("notice", "*", null, null, 'id DESC', null);
$result = $obj->getResult();
if (count($result) > 0) {
    echo '<div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th width=5%>SL.</th>
                            <th>Title</th>
                            <th width=10%>Date</th>
                            <th width=5%>View</th>
                            <th width=5%>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
    $i = 1;
    foreach ($result as list('id' => $id, 'title' => $title, 'link' => $link, "date" => $date, 'media' => $media)) {
        echo "<tr>
                    <td scope='row'>$i</td>
                    <td>
                        <p>$title</p>
                    </td>
                    <td>$date</td>
                    <td>";
                    if($media !== null){
                        echo "<a href='php_files/download_pdf_file.php?l_id={$media}' class='btn btn-outline-primary btn-sm'><i class='bi bi-arrow-down-circle-fill'></i></a>";
                    }else{
                        echo "<a href='$link' target='_blanck' class='btn btn-outline-success btn-sm'><i class='bi bi-share-fill'></i></a>";
                    }
                    echo "</td>
                    <td>
                        <button type='button' data-notice_id='$id' id='NoticeDelete' class='btn btn-outline-danger btn-sm'><i class='bi bi-trash3'></i></button>
                    </td>
                </tr>";
        $i++;
    }
    echo ' </tbody>
            </table>
        </div>
    </div>';
} else {
    echo "<div class='card mt-2 '>
                <div class='text-center'><span class='text-danger h4 '>No Data Found !</span></div>
                </div>";
}




                                        
                                   