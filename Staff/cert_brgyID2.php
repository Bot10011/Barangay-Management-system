<?php 

    include 'navbar.php'; 
    date_default_timezone_set('Asia/Manila');
    $dateToday = date("F d, Y");

    if(isset($_GET['residenceId']) && isset($_GET['purpose']) && isset($_GET['date']) && isset($_GET['IDNumber'])) {
    $residenceId = $_GET['residenceId'];
    $purpose     = $_GET['purpose'];
    $IDNumber     = $_GET['IDNumber'];
    $date        = $_GET['date'];

    $fetch = mysqli_query($conn, "SELECT * FROM residence WHERE residenceId='$residenceId'");
    $row = mysqli_fetch_array($fetch);

    
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Barangay Construction Clearance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="resident.php">Home</a></li>
              <li class="breadcrumb-item active">Barangay Construction Clearance</li>
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
            <div class="invoice mb-3" id="printElement" style="border: none;line-height: 16px;">

                  <div class="row p-0 m-0 position-relative" style="max-height: 500px; min-height: 500px;">
                    <img src="../images/Screenshot (239).jpg" alt="" class="position-absolute" width="100%" height="100%">
                    <img src="../images/pasay-logo-2.png" alt="" class="position-absolute" width="300" style="right: 100px;top: 100px;">
                    <div class="col-3  text-center" >
                      <h5 style="color: #ffe6f3; text-shadow: 2px 0 #fff;"><b>ID NUMBER</b><br>
                      <span class="bg-light p-1">2023-<?php echo $IDNumber; ?></span></h5>
                    </div>
                    <div class="col-6  text-center text-white" style="text-shadow: 2px 0 #fff;">
                       <address>
                        Republic of the Philippines<br>
                        <strong>District 1, Pasay City</strong><br><br>
                        <span class="h4 " style="letter-spacing: 5px; color: #ffcce6 !important; text-shadow: 3px 0 #ffcce6;"><b>BARANGAY 193</b></span><br>
                      </address>
                    </div>    
                    <div class="col-3">
                        <img src="../images/logo.png" alt="" width="130" class="d-block m-auto">
                    </div>

                    <div class="col-3 " style="margin-top: -70px;">
                      <div class="d-block m-auto" style="height: 150px;width: 150px; border: 6px solid green;">
                        <img src="../images-residence/<?php echo $row['image']; ?>" alt="" width="100%" height="100%" style="object-fit: contain;">
                      </div>
                        <br>
                        <br>
                        <img src="../images/PasayLoo.png" alt="" width="150" class="d-block m-auto">
                    </div>
                    <div class="col-9  text-start" style="margin-top: -70px;">
                          <style>
                            p.text-dark, p.text-green {
                              margin-top: -7px;
                              text-shadow: 1px 0 #fff;
                            }
                            p.upper {
                              text-transform: uppercase;

                            }
                          </style>
                          <div class="row" style="font-size: 12px;">
                            <div class="col-3">
                              <p class="text-green text-bold" >FIRST NAME</p>
                            </div>
                            <div class="col-9">
                              <p class="text-dark text-bold upper" ><?php echo $row['firstname']; ?></p>
                            </div>
                            <div class="col-3">
                              <p class="text-green text-bold">MIDDLE NAME</p>
                            </div>
                            <div class="col-9">
                              <p class="text-dark text-bold upper"><?php echo $row['middlename']; ?></p>
                            </div>
                            <div class="col-3">
                              <p class="text-green text-bold">LAST NAME</p>
                            </div>
                            <div class="col-9">
                              <p class="text-dark text-bold upper"><?php echo $row['lastname']; ?></p>
                            </div>
                            <div class="col-3">
                              <p class="text-green text-bold">SUFFIX/EXT.</p>
                            </div>
                            <div class="col-9">
                              <p class="text-dark text-bold upper"><?php echo $row['suffix']; ?></p>
                            </div>
                            <div class="col-3">
                              <p class="text-green text-bold">ADDRESS</p>
                            </div>
                            <div class="col-9">
                              <p class="text-dark text-bold upper"><?php echo ' '.$row['house_no'].' '.$row['street_name'].' '.$row['purok'].' '.$row['zone'].' '.$row['barangay'].' '.$row['municipality'].' '.$row['province'].' '.$row['region'].' '; ?></p>
                            </div>
                            <div class="col-3">
                              <p class="text-green text-bold">BIRTHDAY</p>
                            </div>
                            <div class="col-3">
                              <p class="text-dark text-bold"><?php echo date("m-d-Y", strtotime($row['dob'])); ?><br><span class="text-xs">MM-DD-YYYY</span></p>
                            </div>
                            <div class="col-3">
                              <p class="text-green text-bold">CIVIL STATUS</p>
                            </div>
                            <div class="col-3">
                              <p class="text-dark text-bold upper"><?php echo $row['civilstatus']; ?></p>
                            </div>
                            <div class="col-3">
                              <p class="text-green text-bold">BLOOD TYPE</p>
                            </div>
                            <div class="col-3">
                              <p class="text-dark text-bold upper"></p>
                            </div>
                            <div class="col-3">
                              <p class="text-green text-bold">GENDER</p>
                            </div>
                            <div class="col-3">
                              <p class="text-dark text-bold upper"><?php echo $row['gender']; ?></p>
                            </div>
                            <div class="col-4">
                              <p class="text-green text-bold">RESIDENCE STATUS</p>
                            </div>
                            <div class="col-4">
                              <p class="text-dark text-bold upper"><?php echo $row['resident_status']; ?></p>
                            </div>
                            <div class="col-4">
                              <p class="text-green text-bold upper">VOTER</p>
                            </div>
                            <div class="col-3">
                              <p class="text-dark text-bold">DATE ISSUED</p>
                            </div>
                            <div class="col-3">
                              <p class="text-dark text-bold"><?php echo date("m-d-Y"); ?><br><span class="text-xs">MM-DD-YYYY</span></p>
                            </div>
                            <div class="col-6 mt-4">
                              <p class="text-dark text-bold"><span class="text-xs">VALID UNTIL: sample date</span></p>
                            </div>  
                            
                          </div>


                          <div class="position-absolute" style="height: 70px;width: 70px; right: 15px; top: 245px;">
                            <img src="../images-residence/<?php echo $row['qrCode']; ?>" alt="" width="100%" height="100%" style="object-fit: contain;">
                          </div>


                    </div>
                    <div class="col-12 position-absolute" style="bottom: -8px;">
                      <p class="text-bold text-center " style="text-shadow: 2px 0 #fff; bottom: 21px; left: 35%;">RESIDENT IDENTIFICATION CARD</p>
                    </div>
                    
                  </div>

                  <div class="row mt-3"></div>

                  <div class="row p-0 m-0" style="max-height: 500px; min-height: 500px;border: 4px solid black;">
                    <img src="../images/IDFooter.jpg" alt="" class="position-absolute" height="200" width="99%" style="bottom: 5px;">
                    <div class="col-3 mt-3">
                        <div class="d-block m-auto" style="height: 150px;width: 150px; border: 6px solid magenta;">
                          <p class="text-sm" style="margin-left: 23px; margin-top: 120px;">THUMB MARK</p>
                        </div>
                    </div>
                    <div class="col-9 mt-3" style="line-height: 25px;">
                      <p><b><span style="letter-spacing: 5px;">IN CASE OF EMERGENCY, PLEASE CONTACT:</span></b></br>
                      Name:______________________________________________________________________</br>
                      Address:____________________________________________________________________</br>
                      Contact No:_________________________________________________________________</br>
                      SSS/GSIS/UMID No:_________________________________________________________</br>
                      TIN No:_____________________________________________________________________
                    </div>
                    <div class="col-6 text-center" style="margin-top: 15px;">
                      <p>_______________________________________<br> <span style="font-style: italic;">Cardholder's Signature</span></p>
                    </div>
                    <div class="col-6 text-center" style="margin-top: 15px;">
                      <p>_______________________________________ <br> HON. MICHAEL F. DAWAL <br><span class="text-sm" style="font-style: italic;">Punong Barangay</span><br><span class="text-xs" style="font-style: italic;"><b>"Pag Nag Droga Ka, Lagot Ka"</b></span></p>
                    </div>

                    <div class="col-12 text-center text-bold" style="line-height: 16px; text-align: justify;">
                      <p style="font-style: italic;">THIS IS TO CERTIFY THAT THE BEARER OF THIS CARD WHOSE PICTURE, SIGNATURE AND THUMB MARK APPEAR HERE ON IS A REGISTERED RESIDENT OF BARANGAY 193, ZONE 20, PASAY CITY. <br> THIS IDENTIFICATION CARD IS BEING ISSUED FOR WHATEVER <br>LAWFUL PURPOSE IT MAY SERVE. </p><br>

                      <p style="letter-spacing: 2px;">Barangay 193 Multi-Purpose Hall Pildera II, Pasay City 1300, MM., Philippines <br>
                      Contact Number: 8-853-6275</p>
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
   // $(window).on('load', function() {
   //  document.getElementById("printButton").click();
   // })
 </script>