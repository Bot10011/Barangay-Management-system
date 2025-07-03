<!-- VIEW QR CODE -->
<div class="modal fade" id="qr<?php echo $row['residenceId']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-qrcode"></i> Resident's QR Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body text-center">
          <img src="../images-qr-codes/<?php echo $row['qrCode']; ?>" alt="" width="300" class="shadow-sm d-block m-auto">
          <h5 class="text-center mt-3">PIN: <?php if($row['residentPIN'] == '') { echo 'NOT SET'; } else { echo $row['residentPIN']; } ?></h5>
          <?php if($row['residentPIN'] !== ''):  ?>
          <a href="" type="button" data-toggle="modal" data-target="#resetPIN<?php echo $row['residenceId']; ?>" data-dismiss="modal" aria-label="Close">Reset PIN</a>
        <?php endif; ?>
      </div>
      <div class="modal-footer alert-light d-flex justify-content-center">
        <a href="../images-qr-codes/<?php echo $row['qrCode']; ?>" type="button" class="btn bg-gradient-primary" download><i class="fa-solid fa-download"></i> Download</a>
      </div>
    </div>
  </div>
</div>



<!-- RESET PIN -->
<div class="modal fade" id="resetPIN<?php echo $row['residenceId']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-qrcode"></i> Reset PIN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <form action="process_update.php" method="POST">
      <input type="hidden" class="form-control" value="<?php echo $row['residenceId']; ?>" name="residenceId">
      <div class="modal-body text-center">
        <div class="row d-flex justify-content-center">
          <div class="col-7">
            <div class="form-group">
              <span><b>New PIN</b></span>
              <input type="number" class="form-control text-center"  placeholder="New PIN" name="PIN" required maxlength="6" minlength="6">
            </div>
          </div>
          <div class="col-7">
            <div class="form-group">
              <span><b>Confirm new PIN</b></span>
              <input type="number" class="form-control text-center" placeholder="Confirm new PIN" name="cPIN" required maxlength="6" minlength="6">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-primary" name="resetPIN"><i class="fa-solid fa-floppy-disk"></i> Confirm</button>
      </div>
    </form>
    </div>
  </div>
</div>







<!-- VIEW PROFILE PHOTO -->
<div class="modal fade" id="viewphoto<?php echo $row['residenceId']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Resident's photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body d-flex justify-content-center">
          <img src="../images-residence/<?php echo $row['image']; ?>" alt="" width="200" height="200" class="img-circle" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
      </div>
      <div class="modal-footer alert-light d-flex justify-content-center">
        <a href="../images-residence/<?php echo $row['image']; ?>" type="button" class="btn bg-gradient-primary" download><i class="fa-solid fa-download"></i> Download</a>
      </div>
    </div>
  </div>
</div>



<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['residenceId']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Delete resident</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['residenceId']; ?>" name="residenceId">
          <h6 class="text-center">Delete resident record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-danger" name="delete_resident"><i class="fas fa-trash"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>








