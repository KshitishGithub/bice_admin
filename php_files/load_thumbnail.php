<?php
include('database.php');
$obj = new Database();
$obj->select("yt_videos", "*", null, null, 'id DESC', null);
$result = $obj->getResult();
if (count($result) > 0) {
    echo '<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th width="15px">Sr.</th>
                                            <th>Title</th>
                                            <th width=15%>Thumbnail</th>
                                            <th width=5%>URL</th>
                                            <th width=10%>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    $i = 1;
    foreach ($result as list('id' => $id, 'yt_title' => $yt_title, 'yt_link' => $yt_link, 'yt_image' => $yt_image)) {
        echo "<tr>
                <td>$i</td>
                <td>$yt_title</td>
                <td><img class='img-fluid rounded' width='120px' src='photos/yt_photo/$yt_image' alt='$yt_image'></td>
                <td><a href='$yt_link' target='_black' class='btn btn-primary'><i class='bi bi-link-45deg mr-2'></i></a></td>
                <td>
                    <button type='button' data-yt_id='$id' class='btn btn-outline-secondary mb-3' id='EditThumbnail'><i class='bi bi-pencil-square'></i></button>
                    <button type='button' data-yt_id='$id' class='btn btn-outline-danger mb-3' id='YoutubeDelete'><i class='bi bi-trash3'></i></button>
                </td>
            </tr>";
        $i++;
    }
    echo '</tbody>
        </table>
    </div>
</div>';
} else {
    echo "<div class='card mt-2 '>
                <div class='text-center'><span class='text-danger h4 '>No Data Found !</span></div>
                </div>";
}





                                        
                                    