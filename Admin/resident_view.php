<title>BMS | Resident info update</title>
<?php 
    include 'navbar.php';

    if(isset($_GET['residenceId'])) {
    $residenceId = $_GET['residenceId'];
    $fetch = mysqli_query($conn, "SELECT * FROM residence WHERE residenceId='$residenceId'");
    $row = mysqli_fetch_array($fetch);
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Resident info</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Resident info</li>
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
              <div class="card-body">
                  <div class="row p-2">
                    <div class="col-lg-12 mt-1 mb-2">
                      <a class="h5 text-primary"><b>Basic information</b></a>
                      <div class="dropdown-divider"></div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-12">
                      <div class="row">
                        <div class="col-lg-12 col col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <small class="text-muted"><b>Full name:</b></small>
                              <h6><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></h6>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                              <small class="text-muted"><b>Date of Birth:</b></small>
                              <h6><?php echo date("F d, Y", strtotime($row['dob'])); ?></h6>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                              <small class="text-muted"><b>Age:</b></small>
                              <h6><?php echo $row['age']; ?></h6>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                              <small class="text-muted"><b>Sex:</b></small>
                              <h6><?php echo $row['gender']; ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-8 col col-md-8 col-sm-6 col-12">
                          <div class="form-group">
                              <small class="text-muted"><b>Place of Birth:</b></small>
                              <h6><?php echo $row['birthplace']; ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                              <small class="text-muted"><b>Civil Status:</b></small>
                              <h6><?php echo $row['civilstatus']; ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                              <small class="text-muted"><b>Citizenship:</b></small>
                              <h6><?php echo $row['citizenship']; ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                              <small class="text-muted"><b>Profession/ Occupation:</b></small>
                              <h6><?php echo $row['occupation']; ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                              <small class="text-muted"><b>Religion:</b></small>
                              <h6><?php echo $row['religion']; ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                              <small class="text-muted"><b>Contact no:</b></small>
                              <h6><?php if($row['contact'] = NULL) { echo $row['contact']; } else{ echo 'N/A'; } ?></h6>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 text-dark">
                      <div class=" d-flex justify-content-center bg-dark d-block m-auto" style="max-height: 120px; min-height: 120px; width: 120px; border: 3px solid darkgray;">
                        <img src="../images-residence/<?php echo $row['image']; ?>" alt="" class="img-fluid d-block m-auto">
                      </div>
                      <p class="text-center text-sm text-muted">Resident photo</p>
                    </div>
                  </div>
                      
                  <div class="row p-2">
                    <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                      <a class="h5 text-primary"><b>Residence address</b></a>
                      <div class="dropdown-divider"></div>
                    </div>
                      <div class="col-lg-9 col-md-6 col-12">
                          <div class="row">
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>House No:</b></small>
                                  <h6><?php echo $row['house_no']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Street name:</b></small>
                                  <h6><?php echo $row['street_name']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Sitio/Purok:</b></small>
                                  <h6><?php echo $row['purok']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Zone:</b></small>
                                  <h6><?php echo $row['zone']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Barangay:</b></small>
                                  <h6><?php echo $row['barangay']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Municipality:</b></small>
                                  <h6><?php echo $row['municipality']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Province:</b></small>
                                  <h6><?php echo $row['province']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Region:</b></small>
                                  <h6><?php echo $row['region']; ?></h6>
                                </div>
                            </div>
                              </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-12 text-dark">
                        <div class=" d-flex justify-content-center bg-dark d-block m-auto" style="max-height: 120px; min-height: 120px; width: 120px; border: 3px solid darkgray;">
                          <img src="../images-signature/<?php echo $row['digital_signature']; ?>" alt="" class="img-fluid d-block m-auto">
                        </div>
                        <p class="text-center text-sm text-muted">Digital Signature</p>
                      </div> 
                  </div> 


                  <div class="row p-2">
                    <div class="col-lg-12 mt-3 mb-2">
                      <a class="h5 text-primary"><b>Additional information</b></a>
                      <div class="dropdown-divider"></div>
                    </div>
                    <!-- FAMILY INFO -->
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <div class="form-group">
                          <small class="text-muted"><b>Family Indicator:</b></small>
                          <h6><?php echo $row['familyIndicator']; ?></h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <div class="form-group">
                          <small class="text-muted"><b>Family Head Name:</b></small>
                          <h6><?php echo $row['headName']; ?></h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <div class="form-group">
                          <small class="text-muted"><b>Family Role:</b></small>
                          <h6><?php echo $row['familyRole']; ?></h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12"></div>
                    <!-- END FAMILY INFO -->
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <div class="form-group">
                          <small class="text-muted"><b>Sector:</b></small>
                          <h6><?php echo $row['sector']; ?></h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <div class="form-group">
                          <small class="text-muted"><b>Residence status:</b></small>
                          <h6><?php echo $row['resident_status']; ?></h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <div class="form-group">
                          <small class="text-muted"><b>Voter status:</b></small>
                          <h6><?php echo $row['voter_status']; ?></h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <div class="form-group">
                          <small class="text-muted"><b>ID status:</b></small>
                          <h6><?php echo $row['ID_status']; ?></h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <div class="form-group">
                          <small class="text-muted"><b>QR status:</b></small>
                          <h6><?php echo $row['QR_status']; ?></h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <div class="form-group">
                          <small class="text-muted"><b>Month of stay:</b></small>
                          <h6><?php echo $row['months_of_stay']; ?></h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <div class="form-group">
                          <small class="text-muted"><b>Years of stay:</b></small>
                          <h6><?php echo $row['years_of_stay']; ?></h6>
                        </div>
                    </div>
                  </div>
                 
              </div>
              <div class="card-footer float-right">
                <a href="resident.php" class="btn bg-secondary btn-sm"><i class="fa-solid fa-circle-left"></i> Back to list</a>
                <a class="btn btn-info btn-sm" href="resident_update.php?residenceId=<?php echo $row['residenceId']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php } else { include '404.php'; } ?>
<?php include 'footer.php';  ?>

