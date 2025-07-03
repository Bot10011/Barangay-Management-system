<title>BMS | Resident info</title>
<?php 
    include 'navbarResidentOnly.php';

    if(isset($_SESSION['residenceId'])) {
    $residenceId = $_SESSION['residenceId'];
    $fetch = mysqli_query($conn, "SELECT * FROM residence WHERE residenceId='$residenceId'");
    $row = mysqli_fetch_array($fetch);
?>

  <div class="content-wrapper bg-info">
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" >
        <div class="row d-flex justify-content-center">

          <div class="col-md-8 col-12 mt-5">
            <div class="card">      
              <div class="card-body">
                  <div class="row p-2">
                    <div class="col-12 mb-2">
                      <a class="h4 text-dark" style="text-transform: uppercase;"><b><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></b></a>
                      <div class="dropdown-divider"></div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-12">
                      <div class="row ">
                        <div class="mt-2 mb-4 col-12">
                          <a class="h6 text-primary"><b>Basic information</b></a>
                          <!-- <div class="dropdown-divider"></div> -->
                        </div>
                        <div class="col-md-4 col-sm-4 col-6">
                          <p class="text-muted text-bold">Date of Birth:<br> 
                            <span class="text-dark text-bold"><?php echo date("F d, Y", strtotime($row['dob'])); ?></span>
                          </p>
                        </div>
                        <div class="col-md-4 col-sm-4 col-6">
                          <p class="text-muted text-bold">Age:<br> 
                            <span class="text-dark text-bold"><?php echo $row['age']; ?></span>
                          </p>
                        </div>
                        <div class="col-md-4 col-sm-4 col-6">
                          <p class="text-muted text-bold">Sex:<br> 
                            <span class="text-dark text-bold"><?php echo $row['gender']; ?></span>
                          </p>
                        </div>
                        <div class="col-md-8 col-sm-8 col-12">
                          <p class="text-muted text-bold">Place of Birth:<br> 
                            <span class="text-dark text-bold"><?php echo $row['birthplace']; ?></span>
                          </p>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <p class="text-muted text-bold">Civil Status:<br> 
                            <span class="text-dark text-bold"><?php echo $row['civilstatus']; ?></span>
                          </p>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <p class="text-muted text-bold">Citizenship:<br> 
                            <span class="text-dark text-bold"><?php echo $row['citizenship']; ?></span>
                          </p>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <p class="text-muted text-bold">Profession/ Occupation:<br> 
                            <span class="text-dark text-bold"><?php echo $row['occupation']; ?></span>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 text-dark">
                      <div class=" d-flex justify-content-center bg-dark d-block m-auto" style="max-height: 120px; min-height: 120px; width: 120px; border: 3px solid darkgray;">
                        <img src="images-residence/<?php echo $row['image']; ?>" alt="" class="img-fluid d-block m-auto">
                      </div>
                      <p class="text-center text-sm text-muted">Resident photo</p>
                    </div> 
                  </div>
                      
                  <div class="row p-2">
                    <div class="mt-3 mb-2 col-12">
                      <a class="h6 text-primary"><b>Residence address</b></a>
                      <div class="dropdown-divider"></div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-12">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <p class="text-muted text-bold">House No:<br> 
                              <span class="text-dark text-bold"><?php echo $row['house_no']; ?></span>
                            </p>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <p class="text-muted text-bold">Street name:<br> 
                              <span class="text-dark text-bold"><?php echo $row['street_name']; ?></span>
                            </p>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <p class="text-muted text-bold">Sitio/Purok:<br> 
                              <span class="text-dark text-bold"><?php echo $row['purok']; ?></span>
                            </p>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <p class="text-muted text-bold">Zone:<br> 
                              <span class="text-dark text-bold"><?php echo $row['zone']; ?></span>
                            </p>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <p class="text-muted text-bold">Barangay:<br> 
                              <span class="text-dark text-bold"><?php echo $row['barangay']; ?></span>
                            </p>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <p class="text-muted text-bold">Municipality:<br> 
                              <span class="text-dark text-bold"><?php echo $row['municipality']; ?></span>
                            </p>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <p class="text-muted text-bold">Province:<br> 
                              <span class="text-dark text-bold"><?php echo $row['province']; ?></span>
                            </p>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <p class="text-muted text-bold">Region:<br> 
                              <span class="text-dark text-bold"><?php echo $row['region']; ?></span>
                            </p>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 text-dark">
                      <div class=" d-flex justify-content-center bg-dark d-block m-auto" style="max-height: 120px; min-height: 120px; width: 120px; border: 3px solid darkgray;">
                        <img src="images-signature/<?php echo $row['digital_signature']; ?>" alt="" class="img-fluid d-block m-auto">
                      </div>
                      <p class="text-center text-sm text-muted">Digital Signature</p>
                    </div>
                  </div> 


                  <div class="row p-2">
                    <div class="col-lg-12 mb-2">
                      <a class="h6 text-primary"><b>Additional information</b></a>
                      <div class="dropdown-divider"></div>
                    </div>
                    <!-- FAMILY INFO -->
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <p class="text-muted text-bold">Family Indicator:<br> 
                        <span class="text-dark text-bold"><?php echo $row['familyIndicator']; ?></span>
                      </p>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <p class="text-muted text-bold">Family Head Name:<br> 
                        <span class="text-dark text-bold"><?php echo $row['headName']; ?></span>
                      </p>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <p class="text-muted text-bold">Family Role:<br> 
                        <span class="text-dark text-bold"><?php echo $row['familyRole']; ?></span>
                      </p>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12"></div>
                    <!-- END FAMILY INFO -->
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <p class="text-muted text-bold">Sector:<br> 
                        <span class="text-dark text-bold"><?php echo $row['sector']; ?></span>
                      </p>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <p class="text-muted text-bold">Residence status:<br> 
                        <span class="text-dark text-bold"><?php echo $row['resident_status']; ?></span>
                      </p>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <p class="text-muted text-bold">Voter status:<br> 
                        <span class="text-dark text-bold"><?php echo $row['voter_status']; ?></span>
                      </p>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <p class="text-muted text-bold">ID status:<br> 
                        <span class="text-dark text-bold"><?php echo $row['ID_status']; ?></span>
                      </p>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <p class="text-muted text-bold">QR status:<br> 
                        <span class="text-dark text-bold"><?php echo $row['QR_status']; ?></span>
                      </p>
                    </div>
                    <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                      <p class="text-muted text-bold">Years of stay:<br> 
                        <span class="text-dark text-bold"><?php echo $row['years_of_stay']; ?></span>
                      </p>
                    </div>
                  </div>
                 
              </div>
              <div class="card-footer">
                <a href="logout.php?page=exit" class="btn bg-secondary btn-sm  float-right"><i class="fa-solid fa-circle-left"></i> Exit</a>
                <!-- <a class="btn btn-info btn-sm" href="resident_update.php?residenceId=<?php echo $row['residenceId']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a> -->
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  <?php } else { include 'notFound.php'; } ?>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<?php include 'footer.php';  ?>

