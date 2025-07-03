<title>BMS | Verify code</title>
<?php 
  include 'navbar.php'; 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-image: url('images/Background.png'); background-repeat: no-repeat; background-size:     cover;background-repeat: no-repeat; background-position: center center;">
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-center">
<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/PHPMailer/src/Exception.php';
    require 'vendor/PHPMailer/src/PHPMailer.php';
    require 'vendor/PHPMailer/src/SMTP.php';

    if(isset($_POST['sendcode'])) {

    $email = $_POST['email'];
    $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($fetch) > 0) {

    $row  = mysqli_fetch_array($fetch);
    $user_Id = $row['user_Id'];
    $key  = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

      $check_code = mysqli_query($conn, "SELECT verification_code FROM users WHERE user_Id='$user_Id'");
      if($check_code == NULL) {

        $insert_code = mysqli_query($conn, "UPDATE users SET verification_code='$key' WHERE user_Id='$user_Id'");
        if($insert_code) {

          $get_code = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
          $row2 = mysqli_fetch_array($get_code);
          $code = $row2['verification_code'];

          $subject = 'Verification code';
          $message = '<p>Good day sir/maam '.$email.', your verification code is <b>'.$code.'</b>. Please do not share this code to other people. Thank you!</p>
          <p>You can change your password by just clicking it <a href="http://localhost/PROJECT%2023.%20Barangay%20Management%20System/changepassword2.php?user_Id='.$user_Id.'&&email='.$email.'&&key='.$code.'">here!</a></p> 
          <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

          $mail = new PHPMailer(true);                            
          try {
            //Server settings
            $mail->isSMTP();                                     
            $mail->Host = 'smtp.gmail.com';                      
            $mail->SMTPAuth = true;                             
            $mail->Username = 'info.shstudent@gmail.com';     
            $mail->Password = 'vfsaoiboazmvybvm';              
            $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );                         
            $mail->SMTPSecure = 'ssl';                           
            $mail->Port = 465;                                   

            //Send Email
            $mail->setFrom('info.shstudent@gmail.com');

            //Recipients
            $mail->addAddress($email);              
            $mail->addReplyTo('info.shstudent@gmail.com');

            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
?>

          <div class="col-lg-4 mt-5">
            <div class="card card-outline card-primary mt-5">
              <div class="card-header text-center">
                <a href="#" class="h1"><b>Enter security code</b></a>
              </div>
              <div class="card-body">
                <p class="login-box-msg">Please check your email for a message with your code. Your code is 6 numbers long.</p>
                <form action="changepassword.php" method="post">
                  <div class="input-group mb-3">
                    <input type="hidden" class="form-control" value="<?php echo $user_Id; ?>" name="user_Id">
                    <input type="hidden" class="form-control" value="<?php echo $email; ?>" name="email">
                    <input type="number" class="form-control" placeholder="Enter code" name="code" minlength="6" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group">
                    <p>We sent your code to: <b><?php echo $email; ?></b></p>
                  </div> 
                  <div class="row">
                    <div class="col-12">
                      <button type="submit" class="btn bg-gradient-primary btn-block"  name="verify_code">Continue</button>
                      <a href="sendcode2.php?email=<?php echo $email; ?>" class="mt-1">Didn't get a code?</a>
                    </div>
                  </div>
                </form>
                <p class="mt-3 mb-1">
                  <a href="login.php">Login</a>
                </p>
              </div>
            </div>
          </div>

  <?php } catch (Exception $e) { ?>

          <div class="col-12 mt-5  text-white">
            <section class="content">
              <div class="error-page">
                <h2 class="headline text-danger">500</h2>
                <div class="error-content">
                  <h3><i class="fas fa-exclamation-triangle text-danger"></i> Email not sent to <b><?php echo $email; ?></b>.</h3>
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

  <?php } } // CLOSING TAG - IF INSERT CODE IS TRUE
      else { ?>

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

<?php } } // CLOSING TAG IF CODE IS NULL
  else {  // ELSE STATEMENT IF VERIFICATION CODE IS NOT NULL

    $update_code = mysqli_query($conn, "UPDATE users SET verification_code='$key' WHERE user_Id='$user_Id'");
    if($update_code) {

      $get_code = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
      $row2 = mysqli_fetch_array($get_code);
      $code = $row2['verification_code'];

      $subject = 'Verification code';
      $message = '<p>Good day sir/maam '.$email.', your verification code is <b>'.$code.'</b>. Please do not share this code to other people. Thank you!</p>
      <p>You can change your password by just clicking it <a href="http://localhost/PROJECT%2023.%20Barangay%20Management%20System/changepassword2.php?user_Id='.$user_Id.'&&email='.$email.'&&key='.$code.'">here!</a></p> 
      <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';


      $mail = new PHPMailer(true);                            
      try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                      
        $mail->SMTPAuth = true;                             
        $mail->Username = 'info.shstudent@gmail.com';     
        $mail->Password = 'vfsaoiboazmvybvm';              
        $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   

        //Send Email
        $mail->setFrom('info.shstudent@gmail.com');

        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('info.shstudent@gmail.com');

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
?>
        
            <div class="col-lg-4 mt-5">
              <div class="card card-outline card-primary mt-5">
                <div class="card-header text-center">
                  <a href="#" class="h1"><b>Enter security code</b></a>
                </div>
                <div class="card-body">
                  <p class="login-box-msg">Please check your email for a message with your code. Your code is 6 numbers long.</p>
                  <form action="changepassword.php" method="post">
                    <div class="input-group mb-3">
                      <input type="hidden" class="form-control" value="<?php echo $user_Id; ?>" name="user_Id">
                      <input type="hidden" class="form-control" value="<?php echo $email; ?>" name="email">
                      <input type="number" class="form-control" placeholder="Enter code" name="code" minlength="6" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                    </div>
                    <div class="input-group">
                      <p>We sent your code to: <b><?php echo $email; ?></b></p>
                    </div> 
                    <div class="row">
                      <div class="col-12">
                        <button type="submit" class="btn bg-gradient-primary btn-block"  name="verify_code">Continue</button>
                        <a href="sendcode2.php?email=<?php echo $email; ?>" class="mt-1">Didn't get a code?</a>
                      </div>
                    </div>
                  </form>
                  <p class="mt-3 mb-1">
                    <a href="login.php">Login</a>
                  </p>
                </div>
              </div>
            </div>

<?php } catch (Exception $e) { ?>

          <div class="col-12 mt-5  text-white">
            <section class="content">
              <div class="error-page">
                <h2 class="headline text-danger">500</h2>
                <div class="error-content">
                  <h3><i class="fas fa-exclamation-triangle text-danger"></i> Email not sent to <b><?php echo $email; ?></b>.</h3>
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

  <?php } } // CLOSING TAG - IF UPDATE CODE IS TRUE
  else { ?>

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

  <?php } } // CLOSING IF ELSE STATEMENT IF VERIFICATION CODE IS NOT NULL
    } // CLOSING IF STATEMENT IF EMAIL IS GREATER THAN 0 (2nd if statement)
  else { ?>

        <div class="col-12 mt-5  text-white">
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

  <?php } } // CLOSING FIRST IF STATEMENT
  else { ?>

          <div class="col-12 mt-5  text-white">
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

  <?php } ?>

        </div>
      </div>
    </div>
  </div>
 

<?php include 'footer.php'; ?>

