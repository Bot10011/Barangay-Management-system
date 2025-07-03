<?php 
	include 'config.php';

	// USERS LOGIN
	if(isset($_POST['login'])) {
		$email    = $_POST['email'];
		$password = md5($_POST['password']);

		$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
		if(mysqli_num_rows($check)===1) {

				$row = mysqli_fetch_array($check);
				$position = $row['user_type'];
				if($position == 'Admin') {
					$_SESSION['admin_Id'] = $row['user_Id'];
					header("Location: Admin/dashboard.php");
				} else {
					$_SESSION['staff_Id'] = $row['user_Id'];
					header("Location: Staff/resident.php");
				}
		} else {
				$_SESSION['message'] = "Incorrect password.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
				header("Location: login.php");
		}
	}


	// SAVE USER
	if(isset($_POST['create_user'])) {
		$firstname       = $_POST['firstname'];
		$middlename      = $_POST['middlename'];
		$lastname        = $_POST['lastname'];
		$suffix          = $_POST['suffix'];
		$gender          = $_POST['gender'];
		$dob             = $_POST['dob'];
		$age             = $_POST['age'];
		$contact         = $_POST['contact'];
		$email           = $_POST['email'];
		$address         = $_POST['address'];
		$password        = md5($_POST['password']);
		$cpassword       = md5($_POST['cpassword']);
		$date_registered = date('Y-m-d');
		$file            = basename($_FILES["fileToUpload"]["name"]);


		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_email) > 0 ) {
						$_SESSION['message']  = "Email is already taken.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
						header("Location: register.php");            
		} else {

				  		// Check if image file is a actual image or fake image
		          $target_dir = "images-users/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
							    $_SESSION['text'] = "Please try again.";
							    $_SESSION['status'] = "error";
									header("Location: register.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message']  = "Your file was not uploaded.";
							    $_SESSION['text'] = "Please try again.";
							    $_SESSION['status'] = "error";
									header("Location: register.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     	
                      	$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, image, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file','$date_registered')");

                            if($save) {
	                            $_SESSION['message']  = "User information has been successfully saved!";
													    $_SESSION['text'] = "Please try again.";
													    $_SESSION['status'] = "success";
															header("Location: register.php");                             
                            } else {
                              $_SESSION['message'] = "Something went wrong while saving the information. Please try again.";
													    $_SESSION['text'] = "Please try again.";
													    $_SESSION['status'] = "error";
															header("Location: register.php");
                            }
                      } else {
                            $_SESSION['message'] = "There was an error uploading your file.";
												    $_SESSION['text'] = "Please try again.";
												    $_SESSION['status'] = "error";
														header("Location: register.php");
                      }
				 }
		}

	}
	


// QR CODE SCANNING - SCANQRCODE.PHP
if(isset($_POST['residentQR'])) {
	$residentQR = $_POST['residentQR'];

	$check = mysqli_query($conn, "SELECT * FROM residence WHERE residentCode='$residentQR'");
	if(mysqli_num_rows($check) > 0 ) {
		$row = mysqli_fetch_array($check);
		$residenceId = $row['residenceId'];
		$checkPin = mysqli_query($conn, "SELECT * FROM residence WHERE residentPIN='' AND residenceId='$residenceId'");
		if(mysqli_num_rows($checkPin) > 0) {
			header("Location: PINsettings.php?page=firstTimer&&residenceId=".$residenceId);
		} else {
			header("Location: PINsettings.php?page=accessInfo&&residenceId=".$residenceId);
		}
	} else {
		$_SESSION['message'] = "There is no resident record found with this QR Code.";
    $_SESSION['text'] = "Please try again.";
    $_SESSION['status'] = "error";
		header("Location: scanQRCode.php");
	}
}



// PIN SETTINGS - PINSETTINGS.PHP
if(isset($_POST['PINSettings'])) {
	$residenceId = mysqli_real_escape_string($conn, $_POST['residenceId']);
	$PIN = mysqli_real_escape_string($conn, $_POST['PIN']);

	$update = mysqli_query($conn, "UPDATE residence SET residentPIN='$PIN' WHERE residenceId='$residenceId'");
	if($update) {
		$_SESSION['residenceId'] = $residenceId;
		header("Location: resident_view.php");
	} else {
		$_SESSION['message'] = "Cannot set PIN right now.";
    $_SESSION['text'] = "Please try again.";
    $_SESSION['status'] = "error";
		header("Location: scanQRCode.php");
	}
}


// ACCESS AGAIN INFO THRU PIN - PINSETTINGS.PHP
if(isset($_POST['accessAgain'])) {
	$residenceId = mysqli_real_escape_string($conn, $_POST['residenceId']);
	$PIN = mysqli_real_escape_string($conn, $_POST['PIN']);

	$check = mysqli_query($conn, "SELECT * FROM residence WHERE residenceId='$residenceId' AND residentPIN='$PIN'");
	if(mysqli_num_rows($check) > 0) {
		$_SESSION['residenceId'] = $residenceId;
		header("Location: resident_view.php");
	} else {
		$_SESSION['message'] = "Incorrect PIN.";
    $_SESSION['text'] = "Please try again.";
    $_SESSION['status'] = "error";
		header("Location: PINsettings.php?page=accessInfo&&residenceId=".$residenceId);
	}
}

?>
