<title>BMS | Login</title>
<?php include 'navbar.php'; ?>

  <div class="content-wrapper bg-info">
    <div class="content">
      <div class="container">

<?php 
  if(isset($_GET['page']) && isset($_GET['residenceId'])) {
  $page = $_GET['page'];
  $residenceId = $_GET['residenceId'];

  if($page == 'firstTimer') {
?>
    
     <div class="modal fade" id="add_users" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title" id="exampleModalLabel">PIN Settings</h5>
              <a type="button" href="scanQRCode.php" class="close"  aria-label="Close">
                <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
              </a>
            </div>
            <form action="processes.php" method="POST" autocomplete="off">
              <div class="modal-body text-dark">
                <p class="login-box-msg">PIN Settings<br>Please do not share your PIN to anyone else.</p>
                <input type="hidden" class="form-control text-center" value="<?php echo $residenceId; ?>" required name="residenceId">
                <div class="row d-flex justify-content-center">
                  <div class="col-8">
                    <div class="form-group">
                      <span class="text-bold text-muted text-sm">Enter your PIN</span>
                      <input type="password" class="form-control text-center" autofocus="true" maxlength="6" minlength="6" required id="PIN" name="PIN">
                    </div>
                  </div>
                </div>
                <div class="row  d-flex justify-content-center">
                  <div class="col-8">
                    <div class="form-group">
                      <span class="text-bold text-muted text-sm">Re-type PIN</span>
                      <input type="password" class="form-control text-center" maxlength="6" minlength="6" required id="cPIN" onkeyup="validatePIN()">
                      <small id="wrong_pass_alert" style="font-style: italic;"></small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn bg-gradient-primary" name="PINSettings" id="proceed">Proceed</button>
              </div>
            </form>
          </div>
        </div>
      </div>

<?php } elseif($page == 'accessInfo') { ?>
    
     <div class="modal fade" id="add_users" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title" id="exampleModalLabel">PIN Settings</h5>
              <a type="button" href="scanQRCode.php" class="close"  aria-label="Close">
                <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
              </a>
            </div>
            <form action="processes.php" method="POST" autocomplete="off">
              <div class="modal-body text-dark">
                <p class="login-box-msg">PIN Settings<br>Please do not share your PIN to anyone else.</p>
                <input type="hidden" class="form-control text-center" value="<?php echo $residenceId; ?>" required name="residenceId">
                <div class="row d-flex justify-content-center">
                  <div class="col-8">
                    <div class="form-group">
                      <span class="text-bold text-muted text-sm">Enter your PIN</span>
                      <input type="password" class="form-control text-center" autofocus="true" maxlength="6" minlength="6" required id="PIN" name="PIN" autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn bg-gradient-primary" name="accessAgain" id="proceed">Proceed</button>
              </div>
            </form>
          </div>
        </div>
      </div>

<?php } else { 
          include 'notFound.php'; 
        } 
      } else { 
        include 'notFound.php'; 
      } 
?>

        </div>
      </div>
    </div>

<?php include 'footer.php'; ?>

<script>
  $(window).on('load', function() {
        $('#add_users').modal({
            show: true,
            backdrop: 'static',
            keyboard: false
          })
    });


  function validatePIN() {

      var pass = document.getElementById('PIN').value;
      var confirm_pass = document.getElementById('cPIN').value;
      if (confirm_pass != pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = 'PIN did not matched!';
        document.getElementById('proceed').disabled = true;
        document.getElementById('proceed').style.opacity = (0.4);
      } else {
        document.getElementById('wrong_pass_alert').style.color = '';
        document.getElementById('wrong_pass_alert').innerHTML = '';
        document.getElementById('proceed').disabled = false;
        document.getElementById('proceed').style.opacity = (1);
      }
    }
</script>