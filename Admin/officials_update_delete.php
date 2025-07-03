<!-- VIEW PROFILE PHOTO -->
<div class="modal fade" id="viewphoto<?php echo $row['officialID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Official's picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body d-flex justify-content-center">
          <img src="../images-signature/<?php echo $row['digital_signature']; ?>" alt="" width="200" class="shadow-sm">
      </div>
      <div class="modal-footer alert-light d-flex justify-content-center">
        <a href="../images-signature/<?php echo $row['image']; ?>" type="button" class="btn bg-gradient-primary" download><i class="fa-solid fa-download"></i> Download</a>
      </div>
    </div>
  </div>
</div>


<!-- CREATE NEW -->
<div class="modal fade" id="update<?php echo $row['officialID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-users"></i> Update Official</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data" autocomplete="off">
          <input type="hidden" class="form-control" name="officialID" required value="<?php echo $row['officialID']; ?>">   
          <div class="row">

            <div class="col-lg-6">
              <div class="form-group">
                <span><b>Position</b></span>
                <input type="text" class="form-control"  placeholder="Position" name="position" required value="<?php echo $row['position']; ?>">
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <span><b>First name</b></span>
                <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)" value="<?php echo $row['firstname']; ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <span><b>Middle name</b></span>
                <input type="text" class="form-control"  placeholder="Middle name" name="middlename" onkeyup="lettersOnly(this)" value="<?php echo $row['middlename']; ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <span><b>Last name</b></span>
                <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)" value="<?php echo $row['lastname']; ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <span><b>Suffix name</b></span>
                <input type="text" class="form-control"  placeholder="Jr./Sr." name="suffix" value="<?php echo $row['suffix']; ?>">
              </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                  <span><b>Description</b></span>
                  <textarea class="form-control" id="" placeholder="Description" cols="30" rows="2" name="description" required><?php echo $row['description']; ?></textarea>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="form-group">
                  <span class="text-dark"><b>Upload picture</b></span>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="fileToUpload" onchange="imgPreview(event)">
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
            <div class="col-lg-4">
                <div class="form-group" id="preview">
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-info" name="update_official"><i class="fas fa-pencil-alt"></i> Update</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
  function imgPreview(event)
  {
    var img=URL.createObjectURL(event.target.files[0]);
    var imgdiv= document.getElementById('preview');
    var newimgs=document.createElement('img');
    imgdiv.innerHTML='';
    newimgs.src=img;
    newimgs.width="100";
    newimgs.height="100";
    newimgs.style['border-radius']="50%";
    newimgs.style['display']="block";
    newimgs.style['margin-left']="auto";
    newimgs.style['margin-right']="auto";
    newimgs.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imgdiv.appendChild(newimgs );
  }
</script>



<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['officialID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-users"></i> Delete Official</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['officialID']; ?>" name="officialID">
          <h6 class="text-center">Delete Barangay Official record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-danger" name="delete_official"><i class="fas fa-trash"></i> Delete</button>
      </div>
        </form>
    </div>
</div>



