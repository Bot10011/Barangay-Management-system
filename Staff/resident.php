<title>BMS | Resident Management</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Resident Management</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Resident Management</li>
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
                <a href="resident_add.php" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New Resident</a>
                <a href="export.php?export=resident" class="btn btn-sm bg-success float-right mr-2"><i class="fa-solid fa-file-excel"></i> Export</a>
                <!-- <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div> -->
              </div>
              <div class="card-body p-3">
                <?php include 'resident_filter.php'; ?>
                 <!-- <table id="example1" class="table table-bordered table-hover text-sm"> -->
                 <table id="exampleUser" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr> 
                    <th>PHOTO</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>SECTOR</th>
                    <th>CITIZENSHIP</th>
                    <th>RESIDENT STATUS</th>
                    <th>TOOLS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">

                    <?php 
                      if(isset($_POST['filter'])) {
                        $gender          = $_POST['gender'];
                        $sector          = $_POST['sector'];
                        $citizenship     = $_POST['citizenship'];
                        $residentstatus  = $_POST['resident_status'];
                        $IDstatus        = $_POST['ID_status'];
                        $yearsofstay     = $_POST['years_of_stay'];
                        $age             = $_POST['age'];
                        $addedBy         = $_POST['added_By'];
                        $familyRole      = $_POST['familyRole'];
                        $headName        = $_POST['headName'];
                        $familyIndicator = $_POST['familyIndicator'];
                        $religion        = $_POST['religion'];

                        // $filter = mysqli_query($conn, "SELECT * FROM residence WHERE gender='$gender' AND sector='$sector' AND citizenship='$citizenship' AND resident_status='$resident_status' AND ID_status='$ID_status' AND years_of_stay='$years_of_stay' AND age='$age'  AND added_By='$added_By' AND familyRole='$familyRole' AND headName='$headName' AND familyIndicator='$familyIndicator' AND religion='$religion' ");
                        
                        $filter = mysqli_query($conn, "SELECT * FROM residence WHERE gender LIKE '%$gender%' AND sector LIKE '%$sector%' AND citizenship LIKE '%$citizenship%' AND resident_status LIKE '%$residentstatus%' AND ID_status LIKE '%$IDstatus%' AND years_of_stay LIKE '%$yearsofstay%' AND age LIKE '%$age%' AND added_By LIKE '%$addedBy%' AND familyRole LIKE '%$familyRole%' AND headName LIKE '%$headName%' AND familyIndicator LIKE '%$familyIndicator%' AND religion LIKE '%$religion%' ORDER BY firstname ");

                        // $filter = mysqli_query($conn, "SELECT * FROM residence WHERE gender LIKE '%$gender%' || sector='$sector' || citizenship LIKE '%".$citizenship."%' || resident_status LIKE '%".$resident_status."%' || ID_status LIKE '%".$ID_status."%' || years_of_stay LIKE '%".$years_of_stay."%' || age LIKE '%".$age."%' || added_By LIKE '%".$added_By."%' || familyRole LIKE '%".$familyRole."%' || headName LIKE '%".$headName."%' || familyIndicator LIKE '%".$familyIndicator."%' || religion LIKE '%".$religion."%' ORDER BY firstname ");
                        // $filter = mysqli_query($conn, "SELECT * FROM residence WHERE gender='$gender' AND sector='$sector' AND citizenship='$citizenship' AND resident_status='$resident_status' AND ID_status='$ID_status' AND sector LIKE '%".$sector."%' AND gender LIKE '%".$gender."%' AND sector LIKE '%".$sector."%' AND years_of_stay LIKE '%".$years_of_stay."%' AND age LIKE '%".$age."%' AND added_By LIKE '%".$added_By."%' AND familyRole LIKE '%".$familyRole."%' AND headName LIKE '%".$headName."%' AND familyIndicator LIKE '%".$familyIndicator."%' AND religion LIKE '%".$religion."%' ORDER BY firstname ");
                        if(mysqli_num_rows($filter) > 0) {
                          while($row = mysqli_fetch_array($filter)) {
                    ?>
                       <tr>
                            <td>
                                <a data-toggle="modal" data-target="#viewphoto<?php echo $row['residenceId']; ?>">
                                  <img src="../images-residence/<?php echo $row['image']; ?>" alt="" width="25" height="25" class="img-circle d-block m-auto">
                                </a href="">
                            </td>
                            <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['sector']; ?></td>
                            <td class="text-primary"><?php echo $row['citizenship']; ?></td>
                            <td>
                              <?php 
                                if($row['resident_status'] == 'Perma/Owned') {
                                  echo '<i class="fa-solid fa-circle-dot text-primary"></i> '.$row['resident_status'].'';
                                } else {
                                  echo '<i class="fa-solid fa-circle-dot text-danger"></i> '.$row['resident_status'].'';
                                }
                              ?>
                            </td>
                            <td>
                              <a class="btn btn-primary btn-sm" href="resident_view.php?residenceId=<?php echo $row['residenceId']; ?>"><i class="fas fa-folder"></i></a>
                              <a class="btn btn-info btn-sm" href="resident_update.php?residenceId=<?php echo $row['residenceId']; ?>"><i class="fas fa-pencil-alt"></i></a>
                              <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['residenceId']; ?>"><i class="fas fa-trash"></i></button>
                              
                              <?php if($row['personalDocuments'] != ''): ?>
                                  <a class="btn btn-warning btn-sm" href="resident_document.php?residenceId=<?php echo $row['residenceId']; ?>"><i class="fa-solid fa-file"></i></a>
                                <?php else: ?>
                                  <button type="button" class="btn bg-warning btn-sm" data-toggle="modal" data-target="#qr<?php echo $row['residenceId']; ?>" disabled><i class="fa-solid fa-file"></i></button>
                                <?php endif; ?>

                              <?php if($row['qrCode'] != ''): ?>
                                <button type="button" class="btn bg-dark btn-sm" data-toggle="modal" data-target="#qr<?php echo $row['residenceId']; ?>"><i class="fa-solid fa-qrcode"></i></button>
                              <?php else: ?>
                                <button type="button" class="btn bg-dark btn-sm" data-toggle="modal" data-target="#qr<?php echo $row['residenceId']; ?>" disabled><i class="fa-solid fa-qrcode"></i></button>
                              <?php endif; ?>
                            </td> 
                        </tr>

                    <?php
                        } } else {
                    ?>  
                        <tr>
                          <td colspan="100%" class="text-center">No record found</td>
                        </tr>
                    <?php
                        }
                      } else {
                    ?>
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM residence ORDER BY firstname");
                        if(mysqli_num_rows($sql) > 0 ) {
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                          <td>
                              <a data-toggle="modal" data-target="#viewphoto<?php echo $row['residenceId']; ?>">
                                <img src="../images-residence/<?php echo $row['image']; ?>" alt="" width="25" height="25" class="img-circle d-block m-auto">
                              </a href="">
                          </td>
                          <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></td>
                          <td><?php echo $row['gender']; ?></td>
                          <td><?php echo $row['sector']; ?></td>
                          <td class="text-primary"><?php echo $row['citizenship']; ?></td>
                          <td>
                            <?php 
                              if($row['resident_status'] == 'Perma/Owned') {
                                echo '<i class="fa-solid fa-circle-dot text-primary"></i> '.$row['resident_status'].'';
                              } else {
                                echo '<i class="fa-solid fa-circle-dot text-danger"></i> '.$row['resident_status'].'';
                              }
                            ?>
                          </td>
                          <td>
                            <a class="btn btn-primary btn-sm" href="resident_view.php?residenceId=<?php echo $row['residenceId']; ?>"><i class="fas fa-folder"></i></a>
                            <a class="btn btn-info btn-sm" href="resident_update.php?residenceId=<?php echo $row['residenceId']; ?>"><i class="fas fa-pencil-alt"></i></a>
                            <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['residenceId']; ?>"><i class="fas fa-trash"></i></button>
                            
                            <?php if($row['personalDocuments'] != ''): ?>
                                <a class="btn btn-warning btn-sm" href="resident_document.php?residenceId=<?php echo $row['residenceId']; ?>"><i class="fa-solid fa-file"></i></a>
                              <?php else: ?>
                                <button type="button" class="btn bg-warning btn-sm" data-toggle="modal" data-target="#qr<?php echo $row['residenceId']; ?>" disabled><i class="fa-solid fa-file"></i></button>
                              <?php endif; ?>

                            <?php if($row['qrCode'] != ''): ?>
                              <button type="button" class="btn bg-dark btn-sm" data-toggle="modal" data-target="#qr<?php echo $row['residenceId']; ?>"><i class="fa-solid fa-qrcode"></i></button>
                            <?php else: ?>
                              <button type="button" class="btn bg-dark btn-sm" data-toggle="modal" data-target="#qr<?php echo $row['residenceId']; ?>" disabled><i class="fa-solid fa-qrcode"></i></button>
                            <?php endif; ?>
                          </td> 
                      </tr>

                    <?php include 'resident_delete.php'; } } else { ?>
                      <tr>
                        <td colspan="100%" class="text-center">No record found</td>
                      </tr>
                    <?php } } ?>





                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'footer.php';  ?>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->