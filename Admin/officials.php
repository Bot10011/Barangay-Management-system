<title>BMS | Barangay Officials Management</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Barangay Officials Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Barangay Officials Management</li>
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
              <div class="card-header p-2">
                <button type="button" class="btn btn-sm bg-primary ml-2" data-toggle="modal" data-target="#add_users"><i class="fa-sharp fa-solid fa-square-plus"></i> New Official</button>
                <a href="export.php?export=officials" class="btn btn-sm bg-success float-right mr-2"><i class="fa-solid fa-file-excel"></i> Export</a>
               <!--  <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div> -->
              </div>
              <div class="card-body p-3">

                 <!-- <table id="example1" class="table table-bordered table-hover text-sm"> -->
                 <table id="exampleUser" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr>
                    <th>PICTURE</th>
                    <th>NAME</th>
                    <th>POSITION</th>
                    <th>DESCRIPTION</th>
                    <th>DATE ADDED</th>
                    <th>TOOLS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM officials");
                        if(mysqli_num_rows($sql) > 0 ) {
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                        <td>
                            <img src="../images-signature/<?php echo $row['digital_signature']; ?>" alt="" width="25" height="25" class="img-circle d-block m-auto" data-toggle="modal" data-target="#viewphoto<?php echo $row['officialID']; ?>">
                        </td>
                        <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></td>
                        <td>
                          <?php 
                            if($row['position'] == 'Barangay Captain') {
                              echo '<i class="fa-solid fa-star text-warning"></i> '.$row['position'].'';
                            } else {
                              echo '<i class="fa-solid fa-star text-muted"></i> '.$row['position'].'';
                            }

                          ?>
                        </td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['date_registered']; ?></td>
                        <td>
                          <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update<?php //echo $row['officialID']; ?>"><i class="fas fa-folder"></i> View</button> -->
                          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['officialID']; ?>"><i class="fas fa-pencil-alt"></i> Edit</button>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['officialID']; ?>"><i class="fas fa-trash"></i> Delete</button>
                        </td> 
                    </tr>
                    <?php include 'officials_update_delete.php'; } } else { ?>
                        <td colspan="100%" class="text-center">No record found</td>
                      </tr>
                    <?php }?>
                  </tbody>
                </table>

              </div><!-- /.card-body -->
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
