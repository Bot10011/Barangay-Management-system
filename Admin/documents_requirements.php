<title>BMS | Document requirements</title>
<?php 
      include 'navbar.php'; 
      if(isset($_GET['page'])) {

      $certificate = $_GET['page'];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" onload="myOnloadFunction()">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Certification required fields</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Certification required fields</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header col-12">
                <a class="h6 text-primary" id="instruct"><b>Fill in the required fields</b></a>
                <a type="button" onclick="window.history.go(-1); return false;" class="btn bg-success btn-xs float-sm-right"><i class="fa-solid fa-backward"></i> Back</a>
              </div>



              <?php if($certificate == 'indigency'): ?>


              <!-- INDIGENCY -->
              <form action="process_save.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="adminId" value="<?php echo $id; ?>">
                <div class="card-body p-3">
                  <div class="form-group">
                    <span><b>Resident name:</b></span>
                    <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" id="resident" onchange="myFunction(this.value)" required>
                        <option selected disabled value="">Select resident</option>
                        <?php  
                            $residence = mysqli_query($conn, "SELECT * FROM residence");
                            if(mysqli_num_rows($residence) > 0) { 
                            while($row_residence = mysqli_fetch_array($residence)) {
                        ?>
                            <option value="<?php echo $row_residence['residenceId']; ?>"><?php echo ' '.$row_residence['firstname'].' '.$row_residence['middlename'].' '.$row_residence['lastname'].' '.$row_residence['suffix'].' '; ?></option>
                        <?php } } else { ?>
                            <option selected disabled value="">No record found</option>
                        <?php } ?>
                    </select>
                    <!-- PASSING VALUE ON CHANGE -->
                        <input type="hidden" class="form-control" id="as_is_resident" name="residenceId" required>
                        <!-- END PASSING VALUE ON CHANGE -->
                  </div>

                  <div class="form-group">
                    <span><b>Purpose:</b></span>
                    <textarea name="purpose" id="" cols="30" rows="5" class="form-control" placeholder="Enter purpose in getting Brgy. Indigency here..." required></textarea>
                  </div>

                  <div class="form-group">
                    <span class="text-dark"><b>Amount in Peso (₱)</b></span>
                    <input type="number" class="form-control"  placeholder="Enter amount here..." name="paidAmount" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn bg-primary btn-sm" name="acquire_Indigency">Proceed</button>
                </div>
              </form>


              <?php elseif($certificate == 'Residency') : ?>

                <!-- RESIDENCY -->
                
              <form action="process_save.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="adminId" value="<?php echo $id; ?>">
                <div class="card-body p-3">
                  <div class="form-group">
                    <span><b>Resident name:</b></span>
                    <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" id="resident" onchange="myFunction(this.value)" required>
                        <option selected disabled value="">Select resident</option>
                        <?php  
                            $residence = mysqli_query($conn, "SELECT * FROM residence");
                            if(mysqli_num_rows($residence) > 0) { 
                            while($row_residence = mysqli_fetch_array($residence)) {
                        ?>
                            <option value="<?php echo $row_residence['residenceId']; ?>"><?php echo ' '.$row_residence['firstname'].' '.$row_residence['middlename'].' '.$row_residence['lastname'].' '.$row_residence['suffix'].' '; ?></option>
                        <?php } } else { ?>
                            <option selected disabled value="">No record found</option>
                        <?php } ?>
                    </select>
                    <!-- PASSING VALUE ON CHANGE -->
                        <input type="hidden" class="form-control" id="as_is_resident" name="residenceId" required>
                        <!-- END PASSING VALUE ON CHANGE -->
                  </div>

                  <div class="form-group">
                    <span><b>Purpose:</b></span>
                    <textarea name="purpose" id="" cols="30" rows="5" class="form-control" placeholder="Enter purpose in getting Brgy. Residency here..." required></textarea>
                  </div>

                  <div class="form-group">
                    <span class="text-dark"><b>Amount in Peso (₱)</b></span>
                    <input type="number" class="form-control"  placeholder="Enter amount here..." name="paidAmount" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn bg-primary btn-sm" name="acquire_Residency">Proceed</button>
                </div>
              </form>

              <?php elseif($certificate == 'JobSeeker') : ?>

              <!-- JOB SEEKER -->
              <form action="process_save.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="adminId" value="<?php echo $id; ?>">
                <div class="card-body p-3">
                  <div class="form-group">
                    <span><b>Resident name:</b></span>
                    <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" id="resident" onchange="myFunction(this.value)" required>
                        <option selected disabled value="">Select resident</option>
                        <?php  
                            $residence = mysqli_query($conn, "SELECT * FROM residence");
                            if(mysqli_num_rows($residence) > 0) { 
                            while($row_residence = mysqli_fetch_array($residence)) {
                        ?>
                            <option value="<?php echo $row_residence['residenceId']; ?>"><?php echo ' '.$row_residence['firstname'].' '.$row_residence['middlename'].' '.$row_residence['lastname'].' '.$row_residence['suffix'].' '; ?></option>
                        <?php } } else { ?>
                            <option selected disabled value="">No record found</option>
                        <?php } ?>
                    </select>
                    <!-- PASSING VALUE ON CHANGE -->
                        <input type="hidden" class="form-control" id="as_is_resident" name="residenceId" required>
                        <!-- END PASSING VALUE ON CHANGE -->
                  </div>

                  <div class="form-group">
                    <span class="text-dark"><b>Amount in Peso (₱)</b></span>
                    <input type="number" class="form-control"  placeholder="Enter amount here..." name="paidAmount" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn bg-primary btn-sm" name="acquire_Job">Proceed</button>
                </div>
              </form>


              <?php elseif($certificate == 'NonResidency') : ?>

              <!-- NON-RESIDENCY -->
              <form action="process_save.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="adminId" value="<?php echo $id; ?>">
                <div class="card-body p-3">
                  <div class="form-group">
                    <span class="text-dark"><b>Full name</b></span>
                    <input type="text" class="form-control"  placeholder="Enter full name of a Non-Resident person" name="nonresidentname" required>
                  </div>
                  <div class="form-group">
                    <span class="text-dark"><b>Address</b></span>
                    <textarea name="address" class="form-control" id="" placeholder="Enter address of a Non-Resident person" cols="30" rows="5" required></textarea>
                  </div>
                  <div class="form-group">
                    <span class="text-dark"><b>Amount in Peso (₱)</b></span>
                    <input type="number" class="form-control"  placeholder="Enter amount here..." name="paidAmount" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn bg-primary btn-sm" name="acquire_NonResident">Proceed</button>
                </div>
              </form>


              <?php elseif($certificate == 'BarangayClearance') : ?>

              <!-- BARANGAY CLEARANCE -->
              <form action="process_save.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="adminId" value="<?php echo $id; ?>">
                <div class="card-body p-3">
                  <div class="form-group">
                    <span><b>Resident name:</b></span>
                    <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" id="resident" onchange="myFunction(this.value)" required>
                        <option selected disabled value="">Select resident</option>
                        <?php  
                            $residence = mysqli_query($conn, "SELECT * FROM residence");
                            if(mysqli_num_rows($residence) > 0) { 
                            while($row_residence = mysqli_fetch_array($residence)) {
                        ?>
                            <option value="<?php echo $row_residence['residenceId']; ?>"><?php echo ' '.$row_residence['firstname'].' '.$row_residence['middlename'].' '.$row_residence['lastname'].' '.$row_residence['suffix'].' '; ?></option>
                        <?php } } else { ?>
                            <option selected disabled value="">No record found</option>
                        <?php } ?>
                    </select>
                    <!-- PASSING VALUE ON CHANGE -->
                        <input type="hidden" class="form-control" id="as_is_resident" name="residenceId" required>
                        <!-- END PASSING VALUE ON CHANGE -->
                  </div>
                  <div class="form-group">
                    <span><b>Purpose:</b></span>
                    <textarea name="purpose" id="" cols="30" rows="5" class="form-control" placeholder="Enter purpose in getting Brgy. Residency here..." required></textarea>
                  </div>
                  <div class="form-group">
                    <span class="text-dark"><b>Amount in Peso (₱)</b></span>
                    <input type="number" class="form-control"  placeholder="Enter amount here..." name="paidAmount" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn bg-primary btn-sm" name="acquire_BrgyClearance">Proceed</button>
                </div>
              </form>


              <?php elseif($certificate == 'BarangayOwnership') : ?>

              <!-- BARANGAY OWNERSHIP -->
              <form action="process_save.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="adminId" value="<?php echo $id; ?>">
                <div class="card-body p-3">
                  <div class="form-group">
                    <span><b>Resident name:</b></span>
                    <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" id="resident" onchange="myFunction(this.value)" required>
                        <option selected disabled value="">Select resident</option>
                        <?php  
                            $residence = mysqli_query($conn, "SELECT * FROM residence");
                            if(mysqli_num_rows($residence) > 0) { 
                            while($row_residence = mysqli_fetch_array($residence)) {
                        ?>
                            <option value="<?php echo $row_residence['residenceId']; ?>"><?php echo ' '.$row_residence['firstname'].' '.$row_residence['middlename'].' '.$row_residence['lastname'].' '.$row_residence['suffix'].' '; ?></option>
                        <?php } } else { ?>
                            <option selected disabled value="">No record found</option>
                        <?php } ?>
                    </select>
                    <!-- PASSING VALUE ON CHANGE -->
                        <input type="hidden" class="form-control" id="as_is_resident" name="residenceId" required>
                        <!-- END PASSING VALUE ON CHANGE -->
                  </div>
                  <div class="form-group">
                    <span class="text-dark"><b>Amount in Peso (₱)</b></span>
                    <input type="number" class="form-control"  placeholder="Enter amount here..." name="paidAmount" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn bg-primary btn-sm" name="acquire_BrgyOwnership">Proceed</button>
                </div>
              </form>


              <?php elseif($certificate == 'BarangayPlate') : ?>

              <!-- BARANGAY PLATE -->
              <form action="process_save.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="adminId" value="<?php echo $id; ?>">
                <div class="card-body p-3">
                  <div class="form-group">
                    <span><b>Resident name:</b></span>
                    <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" id="resident" onchange="myFunction(this.value)" required>
                        <option selected disabled value="">Select resident</option>
                        <?php  
                            $residence = mysqli_query($conn, "SELECT * FROM residence");
                            if(mysqli_num_rows($residence) > 0) { 
                            while($row_residence = mysqli_fetch_array($residence)) {
                        ?>
                            <option value="<?php echo $row_residence['residenceId']; ?>"><?php echo ' '.$row_residence['firstname'].' '.$row_residence['middlename'].' '.$row_residence['lastname'].' '.$row_residence['suffix'].' '; ?></option>
                        <?php } } else { ?>
                            <option selected disabled value="">No record found</option>
                        <?php } ?>
                    </select>
                    <!-- PASSING VALUE ON CHANGE -->
                        <input type="hidden" class="form-control" id="as_is_resident" name="residenceId" required>
                        <!-- END PASSING VALUE ON CHANGE -->
                  </div>
                  <div class="form-group">
                    <span class="text-dark"><b>Amount in Peso (₱)</b></span>
                    <input type="number" class="form-control"  placeholder="Enter amount here..." name="paidAmount" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn bg-primary btn-sm" name="acquire_BrgyPlate">Proceed</button>
                </div>
              </form>


            <?php elseif($certificate == 'BarangayID') : ?>

              <!-- BARANGAY PLATE -->
              <form action="process_save.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="adminId" value="<?php echo $id; ?>">
                <div class="card-body p-3">
                  <div class="form-group">
                    <span><b>Resident name:</b></span>
                    <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" id="resident" onchange="myFunction(this.value)" required>
                        <option selected disabled value="">Select resident</option>
                        <?php  
                            $residence = mysqli_query($conn, "SELECT * FROM residence");
                            if(mysqli_num_rows($residence) > 0) { 
                            while($row_residence = mysqli_fetch_array($residence)) {
                        ?>
                            <option value="<?php echo $row_residence['residenceId']; ?>"><?php echo ' '.$row_residence['firstname'].' '.$row_residence['middlename'].' '.$row_residence['lastname'].' '.$row_residence['suffix'].' '; ?></option>
                        <?php } } else { ?>
                            <option selected disabled value="">No record found</option>
                        <?php } ?>
                    </select>
                    <!-- PASSING VALUE ON CHANGE -->
                        <input type="hidden" class="form-control" id="as_is_resident" name="residenceId" required>
                        <!-- END PASSING VALUE ON CHANGE -->
                  </div>
                  <div class="form-group">
                    <span class="text-dark"><b>Barangay ID Number</b></span>
                    <input type="number" class="form-control"  placeholder="Enter Barangay ID Number..." name="IDNumber" required>
                  </div>
                  <div class="form-group">
                    <span class="text-dark"><b>Amount in Peso (₱)</b></span>
                    <input type="number" class="form-control"  placeholder="Enter amount here..." name="paidAmount" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn bg-primary btn-sm" name="acquire_BrgyID">Proceed</button>
                </div>
              </form>


              <?php elseif($certificate == 'permit') : ?>

              <!-- BARANGAY PLATE -->
              <form action="process_save.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="adminId" value="<?php echo $id; ?>">
                <div class="card-body p-3">
                  <div class="form-group">
                    <span><b>Resident name:</b></span>
                    <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" id="resident" onchange="myFunction(this.value)" required>
                        <option selected disabled value="">Select resident</option>
                        <?php  
                            $residence = mysqli_query($conn, "SELECT * FROM residence");
                            if(mysqli_num_rows($residence) > 0) { 
                            while($row_residence = mysqli_fetch_array($residence)) {
                        ?>
                            <option value="<?php echo $row_residence['residenceId']; ?>"><?php echo ' '.$row_residence['firstname'].' '.$row_residence['middlename'].' '.$row_residence['lastname'].' '.$row_residence['suffix'].' '; ?></option>
                        <?php } } else { ?>
                            <option selected disabled value="">No record found</option>
                        <?php } ?>
                    </select>
                    <!-- PASSING VALUE ON CHANGE -->
                        <input type="hidden" class="form-control" id="as_is_resident" name="residenceId" required>
                        <!-- END PASSING VALUE ON CHANGE -->
                  </div>

                  <div class="form-group">
                    <span class="text-dark"><b>Trade Name</b></span>
                    <input type="text" class="form-control"  placeholder="Enter Trade Name..." name="tradeName" required>
                  </div>

                  <div class="form-group">
                    <span class="text-dark"><b>Nature/Scope of Business</b></span>
                    <input type="text" class="form-control"  placeholder="Enter Nature/Scope of Business..." name="scopeBusiness" required>
                  </div>

                  <div class="form-group">
                    <span class="text-dark"><b>Control Number</b></span>
                    <input type="text" class="form-control"  placeholder="Enter Control Number..." name="controlNumber" required>
                  </div>

                  <div class="form-group">
                    <span class="text-dark"><b>O.R. Number</b></span>
                    <input type="text" class="form-control"  placeholder="Enter O.R. Number..." name="ORNumber" required>
                  </div>

                  <div class="form-group">
                    <span class="text-dark"><b>Amount in Peso (₱)</b></span>
                    <input type="number" class="form-control"  placeholder="Enter amount here..." name="paidAmount" required>
                  </div>

                <!--   <div class="form-group">
                    <span class="text-dark"><b>Attach signature</b></span>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="exampleInputFile" name="fileToUpload">
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    <p class="help-block text-danger">Max. 500KB</p>
                  </div> -->

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn bg-primary btn-sm" name="acquire_BrgyPermit">Proceed</button>
                </div>
              </form>



              <?php elseif($certificate == 'BarangayConstruction') : ?>

              <!-- BARANGAY PLATE -->
              <form action="process_save.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="adminId" value="<?php echo $id; ?>">
                <div class="card-body p-3">
                  <div class="form-group">
                    <span><b>Resident name:</b></span>
                    <select class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" id="resident" onchange="myFunction(this.value)" required>
                        <option selected disabled value="">Select resident</option>
                        <?php  
                            $residence = mysqli_query($conn, "SELECT * FROM residence");
                            if(mysqli_num_rows($residence) > 0) { 
                            while($row_residence = mysqli_fetch_array($residence)) {
                        ?>
                            <option value="<?php echo $row_residence['residenceId']; ?>"><?php echo ' '.$row_residence['firstname'].' '.$row_residence['middlename'].' '.$row_residence['lastname'].' '.$row_residence['suffix'].' '; ?></option>
                        <?php } } else { ?>
                            <option selected disabled value="">No record found</option>
                        <?php } ?>
                    </select>
                    <!-- PASSING VALUE ON CHANGE -->
                        <input type="hidden" class="form-control" id="as_is_resident" name="residenceId" required>
                        <!-- END PASSING VALUE ON CHANGE -->
                  </div>
                  <div class="form-group">
                    <span class="text-dark"><b>Amount in Peso (₱)</b></span>
                    <input type="number" class="form-control"  placeholder="Enter amount here..." name="paidAmount" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn bg-primary btn-sm" name="acquire_BrgyConstruction">Proceed</button>
                </div>
              </form>


              <?php else : ?>

                <section class="content p-5">
                  <div class="error-page">
                    <h2 class="headline text-warning"> 404</h2>
                    <div class="error-content">
                      <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
                      <p>
                        We could not find the page you were looking for.
                        Meanwhile, you may <a href="dashboard.php">return to dashboard</a> or try using the search form.
                      </p>
                    </div>
                  </div>
                </section>

                <script>
                  window.onload = function() {
                    document.getElementById('instruct').style.display = 'none';
                  };
                </script>

              <?php endif; ?>


            </div>
          </div>
        </div>
      </div>
    </section>
   
  </div>
  

<?php } //END ISSET PAGE ?>

<?php include 'footer.php';  ?>
<script>
    function myFunction(report_section_Id){ 
      var x = document.getElementById("resident").value;
      document.getElementById("as_is_resident").value = x;
    }
</script>