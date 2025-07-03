<!-- CREATE NEW -->
<div class="modal fade" id="add_users" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-plus"></i> Create System User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="row">
            <div class="col-lg-6 mb-2">
                <span><b>Usertype</b></span>
                <select class="form-control" name="usertype" required>
                  <option value="Staff" selected>Staff</option>
                  <!-- <option value="Admin">Admin</option> -->
                </select>
            </div>
            <div class="col-lg-6">
                  <span><b>Username</b></span>
                  <input type="text" class="form-control"  placeholder="Username" name="username" required>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <span><b>First name</b></span>
                  <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)">
                </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                  <span><b>Middle name</b></span>
                  <input type="text" class="form-control"  placeholder="Middle name" name="middlename" onkeyup="lettersOnly(this)">
              </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <span><b>Last name</b></span>
                  <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)">
                </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <span><b>Suffix name</b></span>
                <input type="text" class="form-control"  placeholder="Jr./Sr." name="suffix">
              </div>
            </div>
            <div class="col-auto form-group col-lg-6">
              <span><b>Contact number</b></span>
              <div class="input-group">
                <div class="input-group-text">+63</div>
                <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "9123456789" required maxlength="10">
              </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <span><b>Email address</b></span>
                  <input type="email" class="form-control" id="email" name="email" placeholder = "email@gmail.com" required onkeydown="validation()" onkeyup="validation()">
                  <small id="text" style="font-style: italic;"></small>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <span><b>Password</b></span>
                  <input type="password" class="form-control"  placeholder="Password" name="password" required id="password" minlength="8">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <span><b>Confirm password</b></span>
                  <input type="password" class="form-control" placeholder="Confirm password" name="cpassword" required id="cpassword" onkeyup="validate_password()" minlength="8">
                  <small id="wrong_pass_alert" style="font-style: italic;"></small>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-primary" name="create_system_user" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>

    function validate_password() {

      var pass = document.getElementById('password').value;
      var confirm_pass = document.getElementById('cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);
      } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
      }
    }

    function lettersOnly(input) {
      var regex = /[^a-z ]/gi;
      input.value = input.value.replace(regex, "");
    }


  function validation() {
    var email = document.getElementById("email").value;
    var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = '';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Domain must be @gmail.com';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);
        
    }
  }

</script>


