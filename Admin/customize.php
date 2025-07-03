<title>BMS | Customization Management</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Customization Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Customization Management</li>
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
              <div class="card-header p-2 bg-info">
                <button type="button" class="btn btn-sm bg-light ml-2" data-toggle="modal" data-target="#add_users"><i class="fa-sharp fa-solid fa-square-plus"></i> New customization</button>

                <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool text-light" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-3">
                <style>
                  .setActive:hover{
                    opacity: .8;
                    transition: .3s;
                  }
                </style>
                 <div class="row d-flex justify-content-start">
                   <?php 
                    $fetch = mysqli_query($conn, "SELECT * FROM customization ORDER BY status='Active' DESC");
                    while ($row = mysqli_fetch_array($fetch)) {
                  ?>
                  <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill  p-0">
                      <div class="card-header text-muted border-bottom-0">
                        <?php if($row['status'] == "Active"): ?>
                          <span type="button" class="setActive p-1 rounded" style="background-color: #e6e6e6"><i class="fa-solid fa-lightbulb text-warning"></i> <?php echo $row['status']; ?></span>
                        <?php else: ?>
                          <span type="button" class="setActive p-1 rounded" data-toggle="modal" data-target="#active<?php echo $row['customID']; ?>" style="background-color: #e6e6e6"><i class="fa-solid fa-lightbulb"></i> Set <b>Active</b></span>
                        <?php endif; ?>
                      </div>
                      <div class="card-body pt-0">
                        <img src="../images-customization/<?php echo $row['picture']; ?>" alt="" style="width: 100%; height: 100%; object-fit: contain;" >
                      </div>
                      <div class="card-footer">
                        <div class="text-right">
                          <button class="btn btn-sm bg-danger" data-toggle="modal" data-target="#delete<?php echo $row['customID']; ?>"><i class="fas fa-trash"></i> Delete</button>
                          <button class="btn btn-sm bg-info" data-toggle="modal" data-target="#update<?php echo $row['customID']; ?>"><i class="fas fa-pencil-alt"></i> Edit</button>
                        </div>
                      </div>
                    </div>
                  </div>
              


                  <?php 
                     include 'customize_update_delete.php'; } 
                  ?>

                 </div>

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


<?php include 'customize_add.php'; ?>
<?php include 'footer.php'; ?>
