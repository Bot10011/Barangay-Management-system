<title>BMS | Documents Income</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Documents Income</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Documents Income</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              
              <?php 
                if(isset($_POST['paymentType'])) {
                  $paymentType = mysqli_real_escape_string($conn, $_POST['paymentType']);
                  $fetch1 = mysqli_query($conn, "SELECT * FROM income JOIN users ON income.added_by=users.user_Id WHERE paymentFor='$paymentType' ORDER BY paymentFor");
                  if(mysqli_num_rows($fetch1) > 0) {
              ?>
                  <form method="POST">
                      <div class="card-header p-2">
                           <div class="row d-flex">
                             <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                                  <div class="input-group">
                                    <div class="input-group-append">
                                    <div class="input-group-text">
                                      <i class="fa-solid fa-filter"></i>
                                    </div>
                                  </div>
                                  <select class="form-control form-control-sm small" name="paymentType" required>
                                    <option selected value="">Sort by document type</option>
                                    <?php 
                                      $fetch = mysqli_query($conn, "SELECT DISTINCT paymentFor FROM income ORDER BY paymentFor");
                                      while($row = mysqli_fetch_array($fetch)) { 
                                    ?>
                                    <option value="<?php echo $row['paymentFor']; ?>"><?php echo $row['paymentFor']; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                             </div>
                             <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                                <button type="submit" name="filter" class="btn btn-dark btn-sm"><i class="fa-solid fa-filter"></i> Filter</button>
                                <button type="button" name="filter" class="m-1 btn btn-primary btn-sm" onclick=location=URL><i class="fa-solid fa-arrows-rotate"></i> Refresh</button>
                              </div>
                             <div class="col-lg-6 col-md-6 col-sm-4 col-12">
                               <a href="export.php?income=<?php echo $paymentType; ?>" class="btn btn-sm bg-success float-right mr-2"><i class="fa-solid fa-file-excel"></i> Export</a>
                             </div>
                           </div>
                      </div>
                    </form>
                    <div class="card-body p-3">

                       <!-- <table id="example1" class="table table-bordered table-hover text-sm"> -->
                       <table id="exampleUser" class="table table-bordered table-hover text-sm">
                        <thead>
                        <tr>
                          <th>DOCUMENT TYPE</th>
                          <th>PAYMENT AMOUNT</th>
                          <th>ADDED BY</th>
                          <th>REQUESTED BY</th>
                          <th>DATE ADDED</th>
                        </tr>
                        </thead>
                        <tbody id="users_data">
                          <tr>
                            <?php while ($row = mysqli_fetch_array($fetch1)) { ?>
                              <td><?php echo $row['paymentFor']; ?></td>
                              <td>₱ <?php echo number_format($row['paymentAmount'], 2, '.', ','); ?></td>
                              <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></td>
                              <td><?php echo $row['paid_by']; ?></td>
                              <td><?php echo date("F d, Y", strtotime($row['date_added'])); ?></td>
                          </tr>
                          <?php include 'officials_update_delete.php'; } ?>
                        </tbody>
                      </table>
                    </div>

              <?php } else { ?>

                      <div class="card-header p-2">
                      </div>
                      <div class="card-body p-3">
                        <table id="exampleUser" class="table table-bordered table-hover text-sm">
                          <thead>
                          <tr>
                            <th>DOCUMENT TYPE</th>
                            <th>PAYMENT AMOUNT</th>
                            <th>ADDED BY</th>
                            <th>REQUESTED BY</th>
                            <th>DATE ADDED</th>
                          </tr>
                          </thead>
                          <tbody id="users_data">
                            </tr>
                              <td colspan="100%" class="text-center">No record found</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

              <?php } ?>

              <?php } else { ?>
                
                <form method="POST">
                  <div class="card-header p-2">
                       <div class="row d-flex">
                         <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                              <div class="input-group">
                                <div class="input-group-append">
                                <div class="input-group-text">
                                  <i class="fa-solid fa-filter"></i>
                                </div>
                              </div>
                              <select class="form-control form-control-sm small" name="paymentType" required>
                                <option selected value="">Sort by document type</option>
                                <?php 
                                  $fetch = mysqli_query($conn, "SELECT DISTINCT paymentFor FROM income ORDER BY paymentFor");
                                  while($row = mysqli_fetch_array($fetch)) { 
                                ?>
                                <option value="<?php echo $row['paymentFor']; ?>"><?php echo $row['paymentFor']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                         </div>
                         <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                            <button type="submit" name="filter" class="btn btn-dark btn-sm"><i class="fa-solid fa-filter"></i> Filter</button>
                          </div>
                         <div class="col-lg-6 col-md-6 col-sm-4 col-12">
                           <a href="export.php?income=All" class="btn btn-sm bg-success float-right mr-2"><i class="fa-solid fa-file-excel"></i> Export</a>
                         </div>
                       </div>
                  </div>
                </form>
                <div class="card-body p-3">

                   <!-- <table id="example1" class="table table-bordered table-hover text-sm"> -->
                   <table id="exampleUser" class="table table-bordered table-hover text-sm">
                    <thead>
                    <tr>
                      <th>DOCUMENT TYPE</th>
                      <th>PAYMENT AMOUNT</th>
                      <th>ADDED BY</th>
                      <th>REQUESTED BY</th>
                      <th>DATE ADDED</th>
                    </tr>
                    </thead>
                    <tbody id="users_data">
                      <tr>
                        <?php 
                          $sql = mysqli_query($conn, "SELECT * FROM income JOIN users ON income.added_by=users.user_Id");
                          if(mysqli_num_rows($sql) > 0 ) {
                          while ($row = mysqli_fetch_array($sql)) {
                        ?>
                          <td><?php echo $row['paymentFor']; ?></td>
                          <td>₱ <?php echo number_format($row['paymentAmount'], 2, '.', ','); ?></td>
                          <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></td>
                          <td><?php echo $row['paid_by']; ?></td>
                          <td><?php echo date("F d, Y", strtotime($row['date_added'])); ?></td>
                      </tr>
                      <?php include 'officials_update_delete.php'; } } else { ?>
                          <td colspan="100%" class="text-center">No record found</td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>

                </div>

              <?php } ?>

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include 'officials_add.php'; ?>
<?php include 'footer.php'; ?>
