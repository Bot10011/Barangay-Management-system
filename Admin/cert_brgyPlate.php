<title>BMS | Brgy Plate</title>
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
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
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

                  <div class="row p-0 m-0 position-relative" style="max-height: 530px; min-height: 530px;">
                    <div style="z-index: 1; position: absolute; top: 166px;left: 27px; width: 505px;">
                      <h2 class="text-center" style="text-transform: uppercase;"><b><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></b></h2>
                    </div>
                    <div class="sbg-red" style="z-index: 1; position: absolute; top: 215px;left: 27px; width: 505px;">
                      <h2 class="text-center text-green" style="font-size: 140px;-webkit-text-stroke: 1px  magenta;"><b>0001</b></h2>
                    </div>
                    <img src="../images/Plate2.jpg" alt="" class="position-absolute" width="100%" height="100%">
                    
                    
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