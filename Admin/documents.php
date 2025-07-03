<title>BMS | Documents</title>
<?php 
    include 'navbar.php'; 
    date_default_timezone_set('Asia/Manila');
    $dateToday = date("F d, Y");
?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Documents</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Documents</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fa-solid fa-certificate"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-sm">Barangay Business</span>
                <span class="text-sm">Permit Certificate</span>
                <?php 
                    $doc = mysqli_query($conn, "SELECT * FROM documents WHERE doc_type='Barangay Permit' ");
                    $Permit = mysqli_num_rows($doc);
                ?>
                <span class="info-box-number"><?php echo $Permit; ?></span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <a  href="documents_requirements.php?page=permit" class="progress-description text-light text-sm">More info <i class="fa-solid fa-circle-info"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="fa-solid fa-certificate"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-sm">Barangay Indigency</span>
                <span class="text-sm">Certificate</span>
                <?php 
                    $doc2 = mysqli_query($conn, "SELECT * FROM documents WHERE doc_type='Barangay Indigency' ");
                    $Indigency = mysqli_num_rows($doc2);
                ?>
                <span class="info-box-number"><?php echo $Indigency; ?></span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <a href="documents_requirements.php?page=indigency" class="progress-description text-light text-sm">More info <i class="fa-solid fa-circle-info"></i></a>
                <!-- <a href="cert_brgyIndigency.php" class="progress-description text-light text-sm">More info <i class="fa-solid fa-circle-info"></i></a> -->
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="fa-solid fa-certificate"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-sm">Barangay Residency</span>
                <span class="text-sm">Certificate</span>
                <?php 
                    $doc3 = mysqli_query($conn, "SELECT * FROM documents WHERE doc_type='Barangay Residency' ");
                    $Residency = mysqli_num_rows($doc3);
                ?>
                <span class="info-box-number"><?php echo $Residency; ?></span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <a href="documents_requirements.php?page=Residency" class="progress-description text-light text-sm">More info <i class="fa-solid fa-circle-info"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="fa-solid fa-certificate"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-sm">First Time Job Seeker</span>
                <span class="text-sm">Certificate</span>
                <?php 
                    $doc4 = mysqli_query($conn, "SELECT * FROM documents WHERE doc_type='First Time Job Seeker' ");
                    $Job = mysqli_num_rows($doc4);
                ?>
                <span class="info-box-number"><?php echo $Job; ?></span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <a href="documents_requirements.php?page=JobSeeker" class="progress-description text-light text-sm">More info <i class="fa-solid fa-circle-info"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fa-solid fa-certificate"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-sm">Brgy. Non-Residency</span>
                <span class="text-sm">Certificate</span>
                <?php 
                    $doc5 = mysqli_query($conn, "SELECT * FROM documents WHERE doc_type='Brgy. Non-Residency' ");
                    $Non_Residency = mysqli_num_rows($doc5);
                ?>
                <span class="info-box-number"><?php echo $Non_Residency; ?></span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <a  href="documents_requirements.php?page=NonResidency" class="progress-description text-light text-sm">More info <i class="fa-solid fa-circle-info"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="fa-solid fa-certificate"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-sm">Barangay Clearance</span>
                <span class="text-sm text-success">Certificate</span>
                <?php 
                    $doc6 = mysqli_query($conn, "SELECT * FROM documents WHERE doc_type='Barangay Clearance' ");
                    $Clearance = mysqli_num_rows($doc6);
                ?>
                <span class="info-box-number"><?php echo $Clearance; ?></span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <a href="documents_requirements.php?page=BarangayClearance" class="progress-description text-light text-sm">More info <i class="fa-solid fa-circle-info"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="fa-solid fa-certificate"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-sm">Barangay Construction</span>
                <span class="text-sm">Clearance</span>
                <?php 
                    $doc7 = mysqli_query($conn, "SELECT * FROM documents WHERE doc_type='Barangay Construction' ");
                    $Construction = mysqli_num_rows($doc7);
                ?>
                <span class="info-box-number"><?php echo $Construction; ?></span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <a href="documents_requirements.php?page=BarangayConstruction" class="progress-description text-light text-sm">More info <i class="fa-solid fa-circle-info"></i></a>
              </div>
            </div>
          </div>

         

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="fa-solid fa-certificate"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-sm">Business Plate</span>
                <span class="text-sm text-danger">Certificate</span>
                <?php 
                    $doc9 = mysqli_query($conn, "SELECT * FROM documents WHERE doc_type='Barangay Plate' ");
                    $Plate = mysqli_num_rows($doc9);
                ?>
                <span class="info-box-number"><?php echo $Plate; ?></span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <a href="documents_requirements.php?page=BarangayPlate" class="progress-description text-light text-sm">More info <i class="fa-solid fa-circle-info"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="fa-solid fa-certificate"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-sm">Barangay ID Card</span>
                <span class="text-sm text-success">Clearance</span>
                <?php 
                    $doc10 = mysqli_query($conn, "SELECT * FROM documents WHERE doc_type='Barangay ID Card' ");
                    $Id_card = mysqli_num_rows($doc10);
                ?>
                <span class="info-box-number"><?php echo $Id_card; ?></span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <a href="documents_requirements.php?page=BarangayID" class="progress-description text-light text-sm">More info <i class="fa-solid fa-circle-info"></i></a>
              </div>
            </div>
          </div>

           <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="fa-solid fa-certificate"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-sm">Barangay Ownership</span>
                <span class="text-sm">Certificate</span>
                <?php 
                    $doc11 = mysqli_query($conn, "SELECT * FROM documents WHERE doc_type='Barangay Ownership' ");
                    $Business = mysqli_num_rows($doc11);
                ?>
                <span class="info-box-number"><?php echo $Business; ?></span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <a href="documents_requirements.php?page=BarangayOwnership" class="progress-description text-light text-sm">More info <i class="fa-solid fa-circle-info"></i></a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'footer.php'; ?>
