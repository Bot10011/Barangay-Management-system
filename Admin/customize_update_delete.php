<!-- UPDATE -->
<div class="modal fade" id="update<?php echo $row['customID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-palette"></i> Update Customization</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['customID']; ?>" name="customID">
          <!-- LOAD IMAGE PREVIEW -->
          <div class="form-group" id="img_preview" required>
          </div>
          <div class="form-group">
            <span class="text-dark"><b>Customization image</b></span>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="fileToUpload" onchange="updateimg(event)" required>
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>

            </div>
            <p class="help-block text-danger">Max. 500KB</p>
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-info" name="update_customization"><i class="fas fa-pencil-alt"></i> Update</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
  function updateimg(event)
  {
    var imgimage=URL.createObjectURL(event.target.files[0]);
    var imgimagediv= document.getElementById('img_preview');
    var imgnewimg=document.createElement('img');
    imgimagediv.innerHTML='';
    imgnewimg.src=imgimage;
    imgnewimg.width="100";
    imgnewimg.height="100";
    imgnewimg.style['border-radius']="50%";
    imgnewimg.style['display']="block";
    imgnewimg.style['margin-left']="auto";
    imgnewimg.style['margin-right']="auto";
    imgnewimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imgimagediv.appendChild(imgnewimg);
  }
</script>

  



<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['customID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-palette"></i> Delete Customization</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['customID']; ?>" name="customID">
          <h6 class="text-center">Delete customization record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-danger" name="delete_customization"><i class="fas fa-trash"></i> Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>




<!-- SET ACTIVE -->
<div class="modal fade" id="active<?php echo $row['customID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-palette"></i> Set Active Customization</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['customID']; ?>" name="customID">
          <h6 class="text-center">Set this customization active?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-info" name="setActive_customization"><i class="fas fa-pencil-alt"></i> Update</button>
      </div>
      </form>
    </div>
  </div>
</div>


