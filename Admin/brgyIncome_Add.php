<?php 

    include 'navbar.php';
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

<?php 
    if($page !== 'newIncome') {
      $incomeId = $_GET['page'];
      $fetch = mysqli_query($conn, "SELECT * FROM income WHERE incomeId='$incomeId'");
      $row = mysqli_fetch_array($fetch);
?>      
          <section class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Update income required fields</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Update income</li>
                  </ol>
                </div>
              </div>
            </div>
          </section>
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row d-flex justify-content-center">
                <!-- /.col -->
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-header col-12">
                      <a class="h6 text-primary"><b>Fill in the required fields</b></a>
                      <a href="brgyIncome_list.php" type="button" class="btn bg-success btn-xs float-sm-right"><i class="fa-solid fa-backward"></i> Back</a>
                    </div>

                    <form action="process_update.php" method="POST" autocomplete="off">
                      <input type="hidden" class="form-control" name="adminId" value="<?php echo $id; ?>">
                      <input type="hidden" class="form-control" name="incomeId" value="<?php echo $incomeId; ?>">
                      <div class="card-body p-3">
                        <div class="form-group">
                          <span class="text-dark"><b>Payment for:</b></span>
                          <input type="text" class="form-control"  placeholder="Specify payment type..." name="paymentType" required value="<?php echo $row['paymentFor']; ?>">
                        </div>

                        <div class="form-group">
                          <span><b>Description(Optional):</b></span>
                          <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="Enter purpose in getting Brgy. Indigency here..." ><?php echo $row['paymentDesc']; ?></textarea>
                        </div>

                        <div class="form-group">
                          <span class="text-dark"><b>Amount in Peso (₱)</b></span>
                          <input type="number" class="form-control"  placeholder="Enter amount here..." name="paidAmount" required value="<?php echo $row['paymentAmount']; ?>">
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn bg-primary btn-sm" name="update_income">Submit</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </section>

<?php } else { ?>

          <section class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <h3>New income required fields</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">New income</li>
                  </ol>
                </div>
              </div>
            </div>
          </section>

         <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row d-flex justify-content-center">
                <!-- /.col -->
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-header col-12">
                      <a class="h6 text-primary"><b>Fill in the required fields</b></a>
                      <a href="brgyIncome_list.php" type="button" class="btn bg-success btn-xs float-sm-right"><i class="fa-solid fa-backward"></i> Back</a>
                    </div>

                    <form action="process_save.php" method="POST" autocomplete="off">
                      <input type="hidden" class="form-control" name="adminId" value="<?php echo $id; ?>">
                      <div class="card-body p-3">
                        <div class="form-group">
                          <span class="text-dark"><b>Payment for:</b></span>
                          <input type="text" class="form-control"  placeholder="Specify payment type..." name="paymentType" required>
                        </div>

                        <div class="form-group">
                          <span><b>Description(Optional):</b></span>
                          <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="Enter purpose in getting Brgy. Indigency here..." ></textarea>
                        </div>

                        <div class="form-group">
                          <span class="text-dark"><b>Amount in Peso (₱)</b></span>
                          <input type="number" class="form-control"  placeholder="Enter amount here..." name="paidAmount" required>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn bg-primary btn-sm" name="new_income">Submit</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </section> 

<?php } ?>

        </div>
    
<?php  } else { include '404.php'; } ?>

  

<?php include 'footer.php';  ?>
