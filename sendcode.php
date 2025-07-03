<title>BMS | Send verification code</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-image: url('images/Background.png'); background-repeat: no-repeat; background-size:     cover;background-repeat: no-repeat; background-position: center center;">
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-center">
<?php 
    if(isset($_POST['search'])) {
      $email = $_POST['email'];
      $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
      if(mysqli_num_rows($fetch) > 0) {
      $row = mysqli_fetch_array($fetch);
?>

          <div class="col-lg-4 mt-5">
            <div class="card card-outline card-primary mt-3">
              <div class="card-header text-center">
                <a href="#" class="h1"><b>Reset password</b></a>
              </div>
              <div class="card-body">
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
                <form action="verifycode.php" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group mb-3">
                        <img src="images-users/<?php echo $row['image']; ?>" alt="" style="width: 60px;height: 60px; border-radius: 50%; display: block;margin-left: auto;margin-right: auto;margin-bottom: -12px;">
                      </div>
                      <p class="text-center mb-4"><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></p>
                    </div>
                    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                    <div class="col-md-12">
                      <div class="input-group">
                        <p>Send code via email?</p>
                      </div>
                    </div>
                     <div class="col-md-12" style="margin-top: -18px;">
                      <div class="input-group">
                        <p><b><?php echo $row['email']; ?></b></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <button type="submit" class="btn bg-gradient-primary btn-block"  name="sendcode">Continue</button>
                      <p class="mt-1"><a href="forgot-password.php" class="text-center">Not you?</a></p>  
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

 <?php } else { ?>

          <div class="col-12 mt-5 text-white">
             <section class="content">
              <div class="error-page">
                <h2 class="headline text-warning"> 404</h2>
                <div class="error-content">
                  <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
                  <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may return to<a href="login.php"> login </a>page.
                  </p>
                  <!-- <form class="search-form">
                    <div class="input-group">
                      <input type="text" name="search" class="form-control" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form> -->
                </div>
              </div>
            </section>
          </div>

  <?php } } else { ?>

          <div class="col-12 mt-5  text-white">
            <section class="content">
              <div class="error-page">
                <h2 class="headline text-danger">500</h2>
                <div class="error-content">
                  <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Something went wrong.</h3>
                  <p>
                    We will work on fixing that right away.
                    Meanwhile, you may return to<a href="login.php"> login </a>page.
                  </p>
                  <!-- <form class="search-form">
                    <div class="input-group">
                      <input type="text" name="search" class="form-control" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" name="submit" class="btn btn-danger"><i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form> -->
                </div>
              </div>
            </section>
          </div>

      <?php } ?>

        </div>
      </div>
    </div>
  </div>
 

<?php include 'footer.php'; ?>

