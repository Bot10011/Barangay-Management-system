<title>BMS | Personal document</title>
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
            <h3>Personal document</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Personal document</li>
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
              <div class="card-body p-5">
                  <div class="row">
                      <img src="../images-certificates/<?php echo $row['personalDocuments']; ?>" class="img-fluid d-block m-auto">
                  </div>
                  <hr>
                  <div class="float-right">
                    <a href="resident.php" class="btn bg-secondary btn-sm"><i class="fa-solid fa-backward"></i> Back</a>
                    <button type="button" class="btn bg-info btn-sm" data-toggle="modal" data-target="#updateDocument<?php echo $residenceId; ?>"><i class="fa-solid fa-pen"></i> Edit document</button>
                  </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      
      <!-- UPDATE DOCUMENT -->
    <div class="modal fade" id="updateDocument<?php echo $residenceId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header bg-light">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-file"></i> Update document</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
            </button>
          </div>
          <div class="modal-body">
            <form action="process_update.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" class="form-control" value="<?php echo $row['residenceId']; ?>" name="residenceId">
              <div class="row">
                <div class="col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>Scanned personal documents</b></span>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="certificate" onchange="certs(event)" required>
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>

                      </div>
                      <p class="help-block text-danger">Max. 500KB</p>
                    </div>
                </div>
                <!-- LOAD IMAGE PREVIEW -->
                <div class="col-12">
                    <div class="form-group" id="certspreview">
                    </div>
                </div>
              </div>
          </div>
          <div class="modal-footer alert-light">
            <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
            <button type="submit" class="btn bg-info" name="updateDocument"><i class="fa-solid fa-floppy-disk"></i> Confirm</button>
          </div>
            </form>
        </div>
      </div>


    </section>
</div>

  <?php } else { include '404.php'; } ?>
  
  

<?php include 'footer.php';  ?>

<script>
  function certs(event)
  {
    var certsImage=URL.createObjectURL(event.target.files[0]);
    var certsImageDiv= document.getElementById('certspreview');
    var certsnewImage=document.createElement('img');
    certsImageDiv.innerHTML='';
    certsnewImage.src=certsImage;
    certsnewImage.width="90";
    certsnewImage.height="90";
    certsnewImage.style['border-radius']="50%";
    certsnewImage.style['display']="block";
    certsnewImage.style['margin-left']="auto";
    certsnewImage.style['margin-right']="auto";
    certsnewImage.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    certsImageDiv.appendChild(certsnewImage);
  }
</script>