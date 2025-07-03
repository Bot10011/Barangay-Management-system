<title>BMS | Brgy Non-residency certificate</title>
<?php 

    include 'navbar.php'; 
    date_default_timezone_set('Asia/Manila');
    $dateToday = date("F d, Y");

    if(isset($_GET['nonresidentname']) && isset($_GET['address']) && isset($_GET['purpose']) && isset($_GET['date'])) {
    $nonresidentname = $_GET['nonresidentname'];
    $address         = $_GET['address'];
    $purpose         = $_GET['purpose'];
    $date            = $_GET['date'];

    
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Non-residency certificate</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Non-residency certificate</li>
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

                      <h4 class="text-center mt-4 mb-3">CERTIFICATION</h4>
                      <p class="text-sm m-0" style="text-indent: 30px; text-align: justify;">This is to certify that after careful checking and investigation, <b><?php echo $nonresidentname; ?></b> with alleged address located at <?php echo $address; ?>, that she/he is not a resident of this barangay.</p>
                      <br>
                      <p class="text-sm m-0" style="text-indent: 30px; text-align: justify;">This certification is being issued for whatever legal purpose this may serve.</p>
                  </div>

                </div>

                <!-- CERTIFICATE FOOTER -->
                <?php include 'cert-Footer.php'; ?>
                <!-- CERTIFICATE FOOTER -->


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