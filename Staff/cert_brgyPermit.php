<title>BMS | Brgy Permit certificate</title>
<?php 

    include 'navbar.php'; 
    date_default_timezone_set('Asia/Manila');
    $dateToday = date("F d, Y");

    if(isset($_GET['residenceId']) && isset($_GET['purpose']) && isset($_GET['date']) && isset($_GET['ORNumber'])) {
    $residenceId = $_GET['residenceId'];
    $purpose     = $_GET['purpose'];
    $ORNumber    = $_GET['ORNumber'];
    $date        = $_GET['date'];

    $dt = strtotime($date);
    $plus = date("Y-m-d", strtotime("+1 month", $dt));

    $fetch = mysqli_query($conn, "SELECT * FROM residence JOIN documents ON residence.residenceId=documents.doc_residenceId WHERE residence.residenceId='$residenceId' AND documents.ORNumber='$ORNumber' AND date_acquired='$date'");
    $row = mysqli_fetch_array($fetch);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Barangay Business Plate</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="resident.php">Home</a></li>
              <li class="breadcrumb-item active">Barangay Business Plate</li>
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

                <!-- <img src="../images-signature/<?php //echo $row['e_Signature']; ?>" alt="" class="position-absolute" width="90" style="z-index: 2; bottom: 85px; right: 127px;"> -->

                  <div class="row p-0 m-0 position-relative" style="max-height: 563px; min-height: 563px;">
                    <div class="col-12"  style="z-index: 1; font-style: italic; text-transform: uppercase;">
                       <h5 class="text-center" style=" margin-top: 172px;"><b><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></b></h5>
                       <h5 class="text-center" style=" margin-top: 29px;"><b><?php echo $row['tradeName']; ?></b></h5>
                       <h5 class="text-center" style=" margin-top: 26px;"><b><?php echo $row['businessNature']; ?></b></h5>
                       <h5 class="text-center" style=" margin-top: 36px;"><b><?php echo ' '.$row['house_no'].' '.$row['street_name'].' '.$row['purok'].' '.$row['zone'].' '.$row['barangay'].' '.$row['municipality'].' '.$row['province'].' '.$row['region'].' '; ?></b></h5>
                    </div>

                    <div class="col-12 position-absolute" style="z-index: 1; top: 431px;">
                      <p class="text-sm" style="margin-left: 110px; margin-top: 40px;"><b><?php echo $row['controlNumber']; ?></b></p>
                      <p class="text-sm" style="margin-left: 111px; margin-top: -14px;"><b>₱<?php echo number_format($row['doc_paidAmount'], 2, '.', ','); ?></b></p>
                      <p class="text-sm" style="margin-left: 112px; margin-top: -16px;"><b><?php echo $row['ORNumber']; ?></b></p>
                      <p class="text-sm" style="margin-left: 114px; margin-top: -15px;"><b><?php echo $date; ?></b></p>
                      <p class="text-sm" style="margin-left: 114px; margin-top: -15px;"><b><?php echo $date; ?></b></p>

                      <p class="text-xs position-absolute" style="right: 50px; margin-top: -47px;"><b><?php echo date("F d, Y", strtotime($plus)); ?></b></p>
                     
                    </div>
                        

                    <img src="../images/Permit2.jpg" alt="" class="position-absolute" width="100%" height="100%">
                    
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