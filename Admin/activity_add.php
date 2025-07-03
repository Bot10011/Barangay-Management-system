<!-- CREATE NEW -->
<div class="modal fade" id="add_activity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i> Create Activity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <span class="text-dark"><b>Activity title</b></span>
            <textarea name="activity" class="form-control" id="" cols="30" rows="5" placeholder="Enter Activity name here..." required></textarea>
          </div>
          <div class="form-group">
            <span class="text-dark"><b>Activity date</b></span>
            <input type="date" class="form-control" name="actDate" required>
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-primary" name="create_activity"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>






<!-- SERVES AS REMINDER: DISPLAY ACTIVITY WHEN ACTIVITY DATE IS TODAY -->
<div class="modal fade" id="reminder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i> Activity reminder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
            $i = 1;
            $getAct = mysqli_query($conn, "SELECT * FROM activity WHERE actDate='$date_today'");
            if(mysqli_num_rows($getAct) > 0) {
              while ($aa = mysqli_fetch_array($getAct)) {
        ?>

            <div class="form-group p-0">
              <span class="text-dark"><b>Activity # <?php echo $i++; ?></b></span>
              <p style="text-indent: 30px;text-align: justify;"><?php echo $aa['actName']; ?></p>
              <!-- <p class="text-sm text-right"><?php// echo date("F d, Y", strtotime($aa['actDate'])); ?></p> -->
              <div class="dropdown-divider"></div>
            </div>

        <?php
              }
            }
        ?>
          
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Close</button>
      </div>
    </div>
  </div>
</div>


