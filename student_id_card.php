<?php
define('PAGE', 'ID Card');
include('header.php');
include('sidebar.php');

?>
<!-- <script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script type="text/javascript">
     $(document).ready(function($) {
          $(document).on('click', '.btn_print', function(event) {
               event.preventDefault();

               //credit : https://ekoopmans.github.io/html2pdf.js

               var element = document.getElementById('printSec');

               //easy
               // html2pdf().from(element).save();

               //custom file name
               // html2pdf().set({filename: 'code_with_mark_'+js.AutoCode()+'.pdf'}).from(element).save();


               //more custom settings
               var opt = {
                    margin: 1,
                    filename: 'pageContent_' + js.AutoCode() + '.pdf',
                    image: {
                         type: 'jpeg',
                         quality: 0.98
                    },
                    html2canvas: {
                         scale: 2
                    },
                    jsPDF: {
                         unit: 'in',
                         format: 'letter',
                         orientation: 'portrait'
                    }
               };

               // New Promise-based usage:
               html2pdf().set(opt).from(element).save();
          });
     });
</script> -->


<div class='content-wrapper'>
     <div class='content-header'>
          <div class='container-fluid'>
               <div class="row">
                    <div class="col-12">
                         <nav class="navbar bg-body-tertiary">
                              <div class="container-fluid">
                                   <form class="d-flex" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" role="search">
                                        <input class="form-control me-2" type="search" name="s_id" placeholder="Enter Student ID" aria-label="Search" required>
                                        <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
                                   </form>
                              </div>
                         </nav>
                    </div>
               </div>
               <?php
               if (isset($_POST['submit'])) {
                    $s_id = $_POST['s_id'];
                    $Addobj->rawsql("SELECT r.fname,r.lname,r.father_name,r.mobile,p.batch,f.registration,py.added_on,s.photo FROM registration r INNER JOIN fresh_students f ON r.s_id = f.s_id INNER JOIN personal_details p ON r.s_id = p.s_id INNER JOIN photo_signature s ON r.s_id = s.s_id INNER JOIN payment py ON r.s_id = py.stu_id WHERE f.registration = '{$s_id}'");
                    $result = $Addobj->getResult();
                    if (count($result) > 0) {
                         $qr_data = 'Name:' . $result[0]['fname'] . ' ' . $result[0]['lname'] . ',Father Name:' . $result[0]['father_name'] . ',Apllication ID:' . $result[0]['registration'] . ',Batch:' . $result[0]['batch'] . ',Admission Date:' . $result[0]['added_on'];
               ?>
                         <div class='row' id="printSec">
                              <div class='col-md-4 offset-md-2'>
                                   <div class='students-id'>
                                        <div class='d-flex justify-content-center'>
                                             <img class='img-fluid id-logo' src='assets/img/logo.png' />
                                             <img class='img-fluid id-logo2 pt-2' src='assets/img/since.png' />
                                        </div>
                                        <h6>Bice Institute of Competative Exam Pvt. Ltd.</h6>
                                        <h5>Ministry of Corporate Affairs</h5>
                                        <small><span class='fst-italic green'>Registered by: </span> Government of India</small>

                                        <div class='img-box'>
                                             <h4 class='py-2 bg-primary'>সরকারি চাকরি পাওয়ার একমাত্র সেরা প্রতিষ্ঠান</h4>
                                             <div class='student-img'>
                                                  <img class='img-fluid' src='../admission/photos/images/<?php echo $result['0']['photo'] ?>' />
                                             </div>
                                             <h3 class="text-uppercase"><?php echo $result['0']['fname'] . ' ' . $result['0']['lname'] ?></h3>
                                        </div>

                                        <div class='d-flex p-3'>
                                             <div class='id-content'>
                                                  <p>C/O: <?php echo $result['0']['father_name'] ?></p>
                                                  <p>Batch: <?php echo $result['0']['batch'] ?></p>
                                                  <p>ID: <?php echo $result['0']['registration'] ?></p>
                                                  <p>Mobile: <?php echo $result['0']['mobile'] ?></p>
                                                  <p>Date: <?php echo $result[0]['added_on'] ?></p>
                                             </div>
                                             <div class='id-qr-box'>
                                                  <img class='img-fluid id-qr1' src='https://chart.googleapis.com/chart?cht=qr&chs=150x150&chl= <?php echo $qr_data ?>'>
                                                  <img class='img-fluid id-sig' src='assets/img/sig.png' />
                                                  <p>Director</p>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class='col-md-4'>
                                   <div class='students-id'>
                                        <div class='d-flex justify-content-center'>
                                             <img class='img-fluid id-logo' src='assets/img/logo.png' />
                                             <img class='img-fluid id-logo2 pt-2' src='assets/img/since.png' />
                                        </div>
                                        <h6>Bice Institute of Competative Exam Pvt. Ltd.</h6>
                                        <small><span class='fst-italic green'>Registered by:</span><br></small>
                                        <small class='fs-5'>Ministry of Corporate Affairs Government of India</small>
                                        <div class='img-box'>
                                             <h4 class='py-2 mt-3'>সরকারি চাকরি পাওয়ার একমাত্র সেরা প্রতিষ্ঠান</h4>
                                        </div>

                                        <div class='d-flex m-3 align-items-center'>
                                             <img class='img-fluid id-location' src='assets/img/map.png' />
                                             <div class='id-backside-content'>
                                                  <b>Lakshania More <br />
                                                       Raiganj, Uttar Dinajour, West Bengal - 733156
                                                  </b>
                                             </div>
                                        </div>

                                        <div class='help-line-box mt-2'>
                                             <h4>Help Line</h4>
                                             <h4>9635461103</h4>
                                             <h4>9064687264</h4>
                                        </div>
                                        <div class='text-center my-3'>
                                             <h5>www.biceindia.in</h5>
                                        </div>
                                   </div>
                              </div>
                         <?php
                    } else {
                         ?>
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                   <strong>Opps!</strong> Data not found.
                                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                    <?php }
               }
                    ?>
                         </div>
                         <div class="row">
                              <div class='col-12 d-flex justify-content-center mt-3'>
                                   <!-- <a href='download_id_card.php' target='_blank' class='btn btn-sm btn-success'>Download</a> -->
                                   <!-- <button type="button" class="btn btn-info col-md-1 btn-sm mx-auto mt-2" id="printBtn">Print</button> -->
                                   <input type="button" id="rep" value="Print" class="btn btn-info btn_print">
                              </div>
                         </div>
          </div>
     </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
<script type="text/javascript">
     $(document).ready(function() {
          $(document).on('click', '.btn_print', function(event) {
               event.preventDefault();
               // To create PNG

               domtoimage.toBlob(document.getElementById('printSec')).then(function(blob) {
                    window.saveAs(blob, 'my-node.png');
               });

               // To Create JPEG

               // domtoimage.toJpeg(document.getElementById('printSec'), {
               //           quality: 0.95
               //      })
               //      .then(function(dataUrl) {
               //           var link = document.createElement('a');
               //           link.download = 'my-image-name.jpeg';
               //           link.href = dataUrl;
               //           link.click();
               //      });

          })
     })
</script>


<?php
include('footer.php');
?>