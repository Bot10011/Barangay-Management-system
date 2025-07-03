<title>BMS | Brgy Job Seeker Certificate</title>
<?php 

    include 'navbar.php'; 
    date_default_timezone_set('Asia/Manila');
    $dateToday = date("F d, Y");

    if(isset($_GET['residenceId']) && isset($_GET['purpose']) && isset($_GET['date'])) {
    $residenceId = $_GET['residenceId'];
    $purpose     = $_GET['purpose'];
    $date        = $_GET['date'];

    $fetch = mysqli_query($conn, "SELECT * FROM residence WHERE residenceId='$residenceId'");
    $row = mysqli_fetch_array($fetch);
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>First Job Seeker Certificate</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">First Job Seeker Certificate</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice mb-3" id="printElement" style="border: none;">

              <!-- CERTIFICATE HEADER -->
              <?php include 'certificate-Header.php'; ?>
              <!-- END CERTIFICATE HEADER -->

                <style>
                    div.row div.col-4 p.lead {
                      font-size: 15px;
                    }
                    div.row div.col-4 p.name {
                      font-size: 10px;
                      margin-top: -10px;
                    }
                     div.row div.col-4 p.role {
                      margin-top: -25px;
                      font-size: 10px;
                    }
                    div.row div.col-8 .row p.name, div.row div.col-8 p.names {
                      font-size: 10px;
                    }
                    div.row div.col-8 .row p.name {
                      margin-top: -21px;
                    }
                </style>

                <div class="row p-0">

                <!-- CERTIFICATE SIDEBAR -->
                <?php include 'certificate-Sidebar.php'; ?>
                <!-- END CERTIFICATE SIDEBAR -->

                  <div class="col-8">
                    <!-- BACKGROUND LOGO -->
                      <img src="../images/logo.png" alt="" width="80%" class="position-absolute" style="opacity: .15; top: 100px; left: 50px;">

                      <div class="row">
                        <div class="col-sm-7 invoice-col text-center"></div>
                        <div class="col-sm-5 invoice-col text-center">
                          <small>Control No:__________</small><br>
                          <small>Issued on: <span style="text-decoration: underline;"><?php echo $dateToday; ?></span></small>
                        </div>
                      </div>

                      <h4 class="text-center mt-4 mb-3">
                        CERTIFICATION <br>
                        <span class="text-xs">(First Time Jobseekers Assistance Act - RA 11261)</span>
                      </h4>

                      <p class="text-sm" style="text-indent: 30px; text-align: justify; margin-bottom: -20px;">This is to certify that Mr./Ms. <b><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></b> <?php echo ' '.$row['house_no'].' '.$row['street_name'].' '.$row['purok'].' '.$row['zone'].' '.$row['barangay'].' '.$row['municipality'].' '.$row['province'].' '.$row['region'].' '; ?> for 19 years, is a qualified availed of RA 11261 or the The First Time Jobseekers Assistance Act of 2019.</p>
                      <br>
                      <p class="text-sm" style="text-indent: 30px; text-align: justify; margin-bottom: -20px;">I further certify that the holder/bearer was informed of his/her rights, including the duties and responisibilities accorded by RA 11261 through the Oath of Undertaking he/she has signed and executed in the presence of Barangay Official/s.</p>
                      <br>
                      <p class="text-sm" style="text-indent: 30px; text-align: justify; margin-bottom: -20px;">Signed and issued this <b><?php echo date("F d, Y"); ?></b> in the City of Pasay.</p>
                      <br>
                      <p class="text-sm" style="text-indent: 30px; text-align: justify;">This certification is only valid one(1) year from the assistance.</p>

                      <div class="row" >
                        <div class="col-6 d-flex justify-content-center mt-5 pt-5">
                          <div class="">
                              <p>Witnessed by:</p>
                              <p>Melita L. Llonor</p>
                              <p class="text-muted text-center" style="margin-top: -20px;border-top: 1px solid grey;">Barangay Secretary</p>
                          </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center mb-5">
                              <br>
                              <p style="border-top: 1px solid grey;"><strong>HON. MICHAEL F. DAWAL</strong></p>
                              <p class="text-sm" style="margin-top: -25px;">Punong Barangay</p>
                              <p class="text-sm" style="margin-top: -25px;">Pag Nag Droga Ka, Lagot Ka</p>
                            </div>
                            <p class="text-sm float-right">Encoded by: </p><br>
                            <p class="text-sm text-right mt-3" style="border-bottom: 1px solid grey;width: 50%;position: absolute;right: 0;"></p><br>
                            <p class="text-sm float-right" style="margin-top: -10px;">E. GOMEZ</p>
                        </div>
                      </div>
                  </div>
                </div>

                <br><br><br><br><br>
                
                <div class="row mt-4">
                  <div class="col-4 d-flex justify-content-center">
                      <img src="../images/PasayLoo.png" alt="" width="110" class="position-absolute" >
                  </div>
                  <div class="col-4">
                      <p class="name">THIS FORM NEED NOT BE NOTARIZED</p>
                      <p class="name text-muted" style="margin-top: -20px;">RA 11261 Form 1</p>
                  </div>
                  <div class="col-12 text-center mt-3">
                    <div class="dropdown-divider"></div>
                    <small class="text-danger text-center" style="font-style: italic;font-size: 10px;"><strong>A mark erasure or alteration of any entry invalidates this clearance/Not valid without official dry seal/Expires in ninety(90) days from the date of issue.</strong></small>
                  </div>
                </div>

                 <br><br><br><br>
                
                
                <div class="row invoice-info position-relative p-0 m-0" style="line-height: 18px;">
                  <div class="col-sm-2 invoice-col justify-content-center mt-2">
                    <img src="../images/logo.png" alt="" class="d-block m-auto" width="75">
                  </div>
                  <div class="col-sm-8 invoice-col text-center mt-3">
                    <br>
                    <address>
                      <strong style="text-decoration: underline;">OATH OF UNDERTAKING</strong><br>
                      <small>Republic Act 11261 – First Time Jobseekers Assistance Act</small>
                    </address>
                  </div>
                  <div class="col-sm-2 invoice-col justify-content-center mt-2">
                    <img src="../images/Picture3.png" alt="" class="d-block m-auto" width="75">
                  </div>
                </div>

              <div class="row p-0 m-0" style="line-height: 16px;">
                 <div class="col-sm-12 text-justify p-5" style="margin-bottom: -30px;">
                    <small>I, <span style="text-transform: uppercase;"><b><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></b></span> , <?php echo $row['age']; ?> of age, resident of <span style="text-decoration: underline;"><?php echo ' '.$row['house_no'].' '.$row['street_name'].' '.$row['purok'].' '.$row['zone'].' '.$row['barangay'].' '.$row['municipality'].' '.$row['province'].' '.$row['region'].' '; ?></span>, availing the benefits of <b>Republic Act 11261</b>, otherwise known as the <b>First Time Jobseekers Act of 2019</b>, do hereby declare, agree and undertake to abide and be bound by the following:</small>

                    <br>
                    <br>
                    <small><b>1.</b> That this is the first time that I will actively look for a job, and therefore requesting that a Barangay Certification be issued in my favor to avail the benefits of the law;</small>
                    <br>
                    <small><b>2.</b> That I am aware that the benefit and privilege/s under the said law shall be valid only for one (1) year from the date that the Barangay Certification is issued;</small>
                    <br>
                    <small><b>3.</b> That I can avail the benefits of the law only once;</small>
                    <br>
                    <small><b>4.</b> That I understand that my personal information shall be included in the Roster/List of First Time Jobseekers and will not be used for any unlawful purpose;</small>
                    <br>
                    <small><b>5.</b> That I will inform and/or report to the Barangay personally, through text or other means, or through my family/relatives once I get employed;</small>
                    <br>
                    <small><b>6.</b> That I am not a beneficiary of the JobStart Program under R.A. No. 10869 and other laws that give similar exemptions for the documents or transactions exempted under R.A No. 11261;</small>
                    <br>
                    <small><b>7.</b> That if issued the requested Certification, I will not use the same in any fraud, neither falsify nor help and/or assist in the fabrication of the said certification;</small>
                    <br>
                    <small><b>8.</b> That this undertaking is made solely for the purpose of obtaining a Barangay Certification consistent with the objective of R.A. No. 11261 and not for any other purpose; and</small>
                    <br>
                    <small><b>9.</b> That I consent to the use of my personal information pursuant to the Data Privacy Act and other applicable laws, rules, and regulations.</small>

                    <br><br>
                    <small>Signed this <?php echo date("d"); ?>th day of <?php echo date("F"); ?>, <?php echo date("Y"); ?>, in the City of Pasay.</small>

                  </div>
                  <div class="col-sm-1"></div>
                  <div class="col-sm-4">
                    <br>
                    <small>Signed by:</small><br>
                    <div class="text-center">
                      <br>
                      <br>
                      <small>_________________________</small><br>
                      <small><b>First Time Jobseeker</b></small>
                    </div>
                  </div>
                  <div class="col-sm-2"></div>
                  <div class="col-sm-4">
                    <br>
                    <small>Witnessed by:</small><br>
                    <div class="text-center">
                      <br>
                      <br>
                      <small>_________________________</small><br> 
                      <small><b>MELITA L. LLONOR</b></small><br>
                      <small class="text-muted">Barangay Secretary</small><br>
                      <small><b>Barangay 193, Zone 20 Pasay City</b></small>
                    </div>
                  </div>
               
                  <div class="col-11 d-block m-auto" style="text-align: justify;">
                    <hr>
                    <small>For applicants at least fifteen years old to less than 18 years of age:</small><br>
                    <small>I,___________________________________, ______ years of age, parent/guardian of ___________________________________, and a resident of ___________________________________(complete address), for _______(years/months), do hereby give my consent for my child/dependent to avail the benefits of Republic Act 11261 and be bound by the abovementioned conditions.</small>

                  </div>
                  <div class="col-sm-8 d-block m-auto">
                    <br>
                    <br>
                    <small>Signed by:  _________________________</small><br>
                    <small style="margin-left: 80px;"><b>Parent/Guardian</b></small>

                  </div>

                  <div class="col-sm-11 d-block m-auto">
                    <br>
                    <br>
                    <small><b>THIS FORM NEED NOT BE NOTARIZED</b></small><br>
                    <small class="text-muted">RA 11261 Form 2</small><br>
                    <small class="float-right">Revised as of 23 November 2021</small>
                  </div>

              </div>


              </div>


              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button id="printButton" type="button" class="btn btn-dark float-right mt-3"><i class="fas fa-print"></i> Print</button>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
   
  </div>
 
  <?phP } else { include '404.php'; } ?>

<script src="print.js"> </script>
<?php include 'footer.php'; ?>
 
 <script>
   $(window).on('load', function() {
    document.getElementById("printButton").click();
   })
 </script>